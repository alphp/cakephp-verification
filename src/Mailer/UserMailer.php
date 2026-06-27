<?php
	declare(strict_types=1);

	namespace CakeVerification\Mailer;

    use Cake\Mailer\Mailer;

	/**
	 * User mailer.
	 */
	class UserMailer extends Mailer {
		/**
		 * Mailer's name.
		 *
		 * @var string
		 */
		public static string $name = 'User';
		public function emailVerify (object $user, string $verifyUrl) : void {
			$this->setTo($user->email)
				->setSubject(__('Confirm your email address'))
				->setViewVars(compact('user', 'verifyUrl'));
		}

		public function emailOtp (object $user, string $code) : void {
			$this->setTo($user->email)
				->setSubject(__('Your login code'))
				->setViewVars(compact('user', 'code'));
		}
	}
