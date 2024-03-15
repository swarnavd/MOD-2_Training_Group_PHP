<?php
    /**
    *  Used for check email format valid or not.
    */
    class validation {
        /**
         * It stores the email input as parameter.
         *
         * @email string
         */
        protected $email;
        /**
         * Used for check the format of mail.
         *
         * @email string 
         * @return bool
         */
        public function valid(String $email)
        {   
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                return 0;
              }
            else {
                return 1;
            }
            
        }
    }
?>
