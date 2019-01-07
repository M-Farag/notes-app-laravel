# Notes App
### this is a simple Notes App built with laravel 5.7

__you'll find the link in the welcome page or you can just request '/notes' to find the application__

__Features:__
1. adding notes on the go.
	*loggedUser can add Notes to his own account.
	*also adding Hints as a sub_note checklist.
2. editing , deleting Notes.
3. Data Validation with custome messages.
4. adding Hints in notes as sub tasks or points to be checked 'completed/not-completed'
5. users auth-system.
	* can register
	* can login
	* can add own Notes and Hints
	> default-user group is : 1 __and it's the default value foreach new user__ .
	
	> admin-group is : 2 __this needs to be setup manually__ .

__upcoming updates:__
1. customized Emails.
2. notifications via Email & Whatsapp using ##Twilio##

__Bug Log__
* every loggedIn user can see others' Notes (Fixed)
