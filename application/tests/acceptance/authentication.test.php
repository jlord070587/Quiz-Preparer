<?php

class AuthenticationTest extends PHPUnit_Extensions_Selenium2TestCase {
	protected function setUp()
	{
		$this->setHost('localhost');
		$this->setPort(4444);
		$this->setBrowser('firefox');
		$this->setBrowserUrl('http://quizprep.dev/');
	}

	public function testLoginFormExists()
	{
		$this->assertEquals('', $this->byName('username')->value());
		$this->assertEquals('', $this->byName('password')->value());
	}

	public function testLoginFormReloadsWithErrorsIfValidationFails()
	{
		$this->byName('username')->value(''); // empty should trigger validation error
		$this->byName('password')->value('');
		$this->byCssSelector('form')->submit();

		$usernameErrorText = $this->byCssSelector('form ul li:first-child span')->text();
		$passwordErrorText = $this->byCssSelector('form ul li:nth-child(2) span')->text();

		// Validation errors should be displayed
		$this->assertRegExp('/username.+required/i', $usernameErrorText);
		$this->assertRegExp('/password.+required/i', $passwordErrorText);
	}

	public function testDisplaysOldTextForConvenienceIfValidationFails()
	{
		$this->byName('username')->value('joeThePlumber'); // empty should trigger validation error
		$this->byName('password')->value('');
		$this->byCssSelector('form')->submit();

		$this->assertEquals('joeThePlumber', $this->byName('username')->value());
	}

	public function testLoginPostsToQuizzesWithTheRightCredentials()
	{
		$this->byName('username')->value('admin');
		$this->byName('password')->value('quiz-preparer');
		$this->byCssSelector('form')->submit();

		$this->assertEquals('Quizzes', $this->title());
	}

	public function testLoginFormReloadsIfCredentialsAreIncorrect()
	{
		$this->byName('username')->value('admin');
		$this->byName('password')->value('lol');
		$this->byCssSelector('form')->submit();

		// those credentials were wrong so authentication should fail
		// and the form should be displayed
		$this->assertContains('provided credentials', $this->source());
	}

	public function testQuizzesPageWontDisplayWithoutValidUser()
	{
		$this->url('quizzes'); // we shouldn't have access to this page
		$this->assertContains('Login', $this->title());
	}

	public function testLogoutRoutePerformsTheObvious()
	{
		// log them in
		$this->byName('username')->value('admin');
		$this->byName('password')->value('quiz-preparer');
		$this->byCssSelector('form')->submit();

		// and log them out
		$this->url('logout');

		// they should now be logged out
		$this->assertFalse(Auth::check());

		// and we should now be back to the login page
		$this->assertEquals('Login', $this->title());
	}
}
