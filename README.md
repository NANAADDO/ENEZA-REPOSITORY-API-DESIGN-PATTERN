<h1>ENEZA TECHNICAL REPOSITORY API DESIGN BASE PATTERN</h1>
       <H4>API TESTING</H4>
<p><b>Testing was based on the various operations listed below ;</b></p>
<ul>
    <li>Test whether User can create data without been authenticate</li>
    <li>Test whether User can create course after authentication</li>
    <li>Test whether User can view all course after authentication</li>
    <li>Test whether User can view selected course after authentication</li>
    <li>Test whether User can update a course after authentication</li>
    <li>Test response user get when deleting non existing records after authentication </li>
</ul>
<h5><b>TESTING SETUP & EXECUTING PROCESS</b></h5>
<P>Testing was configured to use a seperate database not the production database.</P>
<ol>
    <li>Create mysql database with name testingunit</li>
    <li>run artisan command to create migration tables in test db (php artisan migrate --database=testingunit)</li>
    <li>run test cmd (vendor\bin\phpunit)</li>
</ol>





## PROJECT INSTALLATION GUIDELINES
<ul>
	<li>Git Pull project into localhost htdocs folder</li>
<li>Taken into consideration composer has already been installed,navigate to the newly created folder in htdocs via the command prompt.</li>
<li>run composer install to install the dependencies/files that git ignores.</li>
<li>create mysql database.</li>
<li>configure database connection details in the .env file with the newly created database.</li>
<li>Run migration  in the command prompt pointing to the project folder ( php artisan migrate)</li>
    <li>Run cmd Generate OAuth2 Personal Access client (php artisan passport:install)
<li>Run cmd to Generate OAuth2 Passport key with the follwoing cmd(php artisan passport:keys)</li>
    
</ul>
<h4>RUN DB SEEDER</h4>
	<ol>
		<li>php artisan db:seed --class=QuizTableDataSeeder</li>
		<li>php artisan db:seed --class=ContentTableDataSeeder</li>
		<li>php artisan db:seed --class=SubjecTableDataSeeder</li>
		<li>php artisan db:seed --class=CourseTbaleDataSeeder</li>
	</ol>

<h5>LAUNCHING APPLICATION IN THE BROWSER TO REGISTER AS A DEVELOPER</h5>
<ol>
<li>Index Page :localhost/yourprojectname/public</li>

<li>Registration Page :localhost/yourprojectname/public/register</li>

<li>Login Page :localhost/yourprojectname/public/login</li>
</ol>

## PROJECT API  DETAILS

<h3>Authentication Details</h3>

Authentication Endpoint : localhost/project-folder-name/public/api/Authentication

<b>Headers</b>
<p>Authorization:Basic Z3JleTpwYXJyb3Q=</p>
<p>Accept:application/json</p>
<p>Content-Type:application/json</p>

<b>Payload(body)</b>

{
"email":"your email",
"password":"your password"
}

/**********************Sample Response************/

{"status":200,"response":"success","token":{"token":"0iaI-TKany5L-5lVAKN1mBEdHxxnX0SGyhQofaehUoUs-BZX
Sc5ZMQ1UEHdC1hDLq0xGINDc_1AphRxR2BbSu9uywcK9NJu1t_kk0Nwc_UiJ6UurPCj0yxftFGlnzGhdG24AB66VZ14r72dMETGcB-bbH11qgmfSnIo1tLg1oCJSEeMUb1WoMzEtYplMl3_6H6VXGn-xFjyWkxa04_n--bgge1vJ-cVimHqS1LoA6H2hBlStWkRc0CkiBYN74lajs-it7oHOnFxqv5PLAypzwz0MjFf3UDLAZ4u3uXS_FH2hJsKDgjBRHIAY_OyMW1vkBY-hzdKse2zM2B4pYqargz4hQWZzHaqQoCFtzYeNRCbebilmIQsHSAIZ1TQLEk8Sjo"}}

<h3>Course CRUD Operation Details</h3>

<h3>Authentication Details</h3>

<b>Headers</b>
<p>Authorization:Bearer pass generated token after successful authentication</p>
<p>Accept:application/json</p>
<p>Content-Type:application/json</p>

<h5><b>CREATE COURSE</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Courses
<p>http verb :<b>POST</></p>
<b>Payload(body)</b>

{
"course_name":"Primary"
}


<h5><b>READ COURSE</b></h5>
<p>1.Read a single course</p>
 Endpoint : localhost/project-folder-name/public/api/Courses/id
<p>http verb :<b>GET</b></p>
		<p>2.Read all course</p>
 Endpoint : localhost/project-folder-name/public/api/Courses
<p>http verb :<b>GET</b></p>


<h5><b>UPDATE COURSE</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Courses/id
<p>http verb :<b>PUT</></p>
<b>Payload(body)</b>

{
"course_name":"Primary"
}


<h5><b>DELETE COURSE</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Courses/id
<p>http verb :<b>DELETE</></p>



<h3>Subject CRUD Operation Details</h3>

<b>Headers</b>
<p>Authorization:Bearer pass generated token after successful authentication</p>
<p>Accept:application/json</p>
<p>Content-Type:application/json</p>

<h5><b>CREATE SUBJECT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Subject
<p>http verb :<b>POST</></p>
<b>Payload(body)</b>

{
"subject_name":"English",
"course_id":"course_id"
}


<h5><b>READ SUBJECT</b></h5>
<p>1.Read a single SUBJECT</p>
 Endpoint : localhost/project-folder-name/public/api/Subject/id
<p>http verb :<b>GET</b></p>
		<p>2.Read all SUBJECT</p>
 Endpoint : localhost/project-folder-name/public/api/Subject
<p>http verb :<b>GET</b></p>


<h5><b>UPDATE SUBJECT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Subject/id
<p>http verb :<b>PUT</></p>
<b>Payload(body)</b>


{
"subject_name":"English",
"course_id":"course_id"
}


<h5><b>DELETE SUBJECT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Subject/id
<p>http verb :<b>DELETE</></p>



<h3>Content CRUD Operation Details</h3>

<b>Headers</b>
<p>Authorization:Bearer pass generated token after successful authentication</p>
<p>Accept:application/json</p>
<p>Content-Type:application/json</p>
<b>Content_Type</b>
<ul>
	<li>QUIZ:1</li>
	<li>COURSE MATERIAL :2</li>
	</ul>

<h5><b>CREATE SUBJECT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Content
<p>http verb :<b>POST</></p>
<b>Payload(body)</b>

{
"content":"YOUR CONTENT",
"subject_id":"subject_id",
"content_type":"1 or 2"
}


<h5><b>READ CONTENT</b></h5>
<p>1.Read a single CONTENT</p>
 Endpoint : localhost/project-folder-name/public/api/Content/id
<p>http verb :<b>GET</b></p>
		<p>2.Read all CONTENT</p>
 Endpoint : localhost/project-folder-name/public/api/Content
<p>http verb :<b>GET</b></p>


<h5><b>UPDATE CONTENT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Content/id
<p>http verb :<b>PUT</></p>
<b>Payload(body)</b>


{
"content":"YOUR CONTENT",
"subject_id":"subject_id",
"content_type":"1 or 2"
}


<h5><b>DELETE CONTENT</b></h5>
 Endpoint : localhost/project-folder-name/public/api/Content/id
<p>http verb :<b>DELETE</></p>


<h3>QuizAnswers CRUD Operation Details</h3>

<b>Headers</b>
<p>Authorization:Bearer pass generated token after successful authentication</p>
<p>Accept:application/json</p>
<p>Content-Type:application/json</p>


<h5><b>CREATE QuizAnswers</b></h5>
 Endpoint : localhost/project-folder-name/public/api/QuizAnswers
<p>http verb :<b>POST</></p>
<b>Payload(body)</b>

{
"answer":"your asnwers",
"content_id":"content_id"
}


<h5><b>READ QuizAnswers</b></h5>
<p>1.Read a single QuizAnswers</p>
 Endpoint : localhost/project-folder-name/public/api/QuizAnswers/id
<p>http verb :<b>GET</b></p>
		<p>2.Read all QuizAnswers</p>
 Endpoint : localhost/project-folder-name/public/api/QuizAnswers
<p>http verb :<b>GET</b></p>


<h5><b>UPDATE QuizAnswers</b></h5>
 Endpoint : localhost/project-folder-name/public/api/QuizAnswers/id
<p>http verb :<b>PUT</></p>
<b>Payload(body)</b>

{
"subject_name":"English",
"course_id":"course_id"
}


<h5><b>DELETE QuizAnswers</b></h5>
 Endpoint : localhost/project-folder-name/public/api/QuizAnswers/id
<p>http verb :<b>DELETE</></p>

