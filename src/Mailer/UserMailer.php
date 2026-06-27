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
            $this->viewBuilder()
                ->setPlugin('CakeVerification')
                ->setTemplate('email_verify');
            $this->setSubject(__('Confirm your email address'))
                ->setViewVars(compact('user', 'verifyUrl'));
        }

        public function emailOtp (object $user, string $code) : void {
            $this->viewBuilder()
                ->setPlugin('CakeVerification')
                ->setTemplate('email_otp');
            $this->setSubject(__('Your login code'))
                ->setViewVars(compact('user', 'code'));
        }
	}
