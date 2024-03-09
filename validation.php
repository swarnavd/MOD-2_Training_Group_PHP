<?php
    /**
     * validation class used for check email format valid or not.
     */
    class validation {
        /**
         * It stores the email input as parameter.
         *
         * @email string
         */
        protected $email;
        /**
         * Valid function used for check the format of mail.
         *
         * @email string 
         * @return bool
         */
        public function valid($email)
        {   
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                return 0;
              }
            else {
                return 1;
            }
            
        }
    }
    // Creating the object for validation class.
    $ob = new validation();
?>
