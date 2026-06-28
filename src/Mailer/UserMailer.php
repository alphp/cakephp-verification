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

        protected function setTemplate (string $name) : static {
            $view = $this->viewBuilder();
            $view->setTemplate($name);

            foreach ($this->getMessage()->getBodyTypes() as $type) {
                if (!is_file(ROOT . DS . 'templates' . DS . 'email' . DS . $type . DS . $name . '.php')) {
                    $view->setPlugin('CakeVerification');
                }
            }

            return $this;
        }

        public function emailVerify (object $user, string $verifyUrl) : void {
            $this->setTemplate('email_verify');
            $this->setSubject(__('Confirm your email address'))
                ->setViewVars(compact('user', 'verifyUrl'));
        }

        public function emailOtp (object $user, string $code) : void {
            $this->setTemplate('email_otp');
            $this->setSubject(__('Your login code'))
                ->setViewVars(compact('user', 'code'));
        }
	}
