# RMSProject
Recruitment Management System


// Name : Radhika Paryekar
//
// Purpose : A web based recruitment management system
// Web application that allows people with either of the two roles to register: job recruiters, job seekers
// Job seekers can add all their personal details, work experience and qualifications
// Job seekers can also upload their resume for job recruiters to see
// Job seekers can search for jobs using company names and apply for the same
// Job recruiters can add all their details, company name, job title, description andd qualifications
// Both Job seekers and recruiters can see their profile which displays all the details they added in the database
// Job recruiters will get the details of the applicants and their cover letter in the applications tab
// Job seekers can check out various jobs in the job boards
// Only one user can be logged in from a browser at a time
//
// Author : radhika.paryekar@colorado.edu
// Version : 10.1
// Date  : 04/26/16

The web page allows for people with either of the two roles to register:
1) Job Seekers 	2) Job Recruiters

The Register tab asks for the following:
User Name
Email id
Password
Confirm Password

All of the above are required fields.
The Password and Confirm Password must match. If not javascript displays an alert message.
The user name must be an available user name and not similar to any already stored in the database. If not an error is displayed.

The User then selects its role in the web app: Job Seeker or Recruiter

If Job Seeker, the user is asked to fill in information related to their job profile
The user is asked for his/her full name, date of birth, qualifications and work experience.
The add more button allows more fields to be added using jquery
The user is then asked to upload his/her resume
Once this is done the user is asked to login with this newly created user name and password
On login the user is redirected to the profile page wherein is displayed all the details entered by the user

If Job Recruiter, the user is asked to fill in information related to their company and job post
The user has to post the job title, description and requirements.
Once this is done the user is asked to login with this newly created user name and password
On login the user is redirected to the profile page wherein is displayed all the details entered by the user
The job recruiters have an extra applications tab wherein they can view the details of all applicants


The home page is the welcome page where the user can search for jobs by company names.
The user can also apply for the jobs

There is a job board tab that displays all the jobs posted by users playing the role of job recruiter
