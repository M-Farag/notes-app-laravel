# MyNotes
### this is a simple Notes App built with laravel 5.7
	yoursite.com/notes to start it.

## __Features:__
1. adding notes OnTheGo.
2. Updating , deleting Notes.
3. Form Validation with custome messages.
4. adding Hints beneath each note as sub To-Do List.
5. users authentication-system.
	* can register.
	* can login/logout.
	* can add own Notes and Hints(subNotes - ToDo list).
	* can check Hints as (completed or inCompleted).
	* user-Groups
		* default users' group id is : 1.
		* admin users' group id is : 2.
			>needs to be edited manually in the DB users-table.

6. EMail Notifications:
	* when adding , updating or deleting a note.



## __Updates__
> system is still on development. More New features will be added later-on.
1. Notes can contain a picture.
2. Admin can change user role from (user:admin OR admin:user)



## __Bug Log__(older to newer)
* every loggedIn user can see others' Notes. (fixed)
* Email Notification Bug. (fixed)
* returning back to Note-edit-form not to Note-Details when editing it. (fixed)
* Error messages when updating a note. (fixed)
