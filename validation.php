<?php
    /**
    *  Used for check email format valid or not.
    */
    class Validation {
        /**
         * It stores the email input as parameter.
         *
         * @var string
         */
        protected $email;
        public function valid(String $email) {   
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return 0;
              }
            else {
                return 1;
            }
            
        }
    }
?>
