<?php
include('config.php');
$var=0;

/*++++++++++++++++++++++++ Admin Details++++++++++++++++++++++++++++++++ */
$sql1="create table  if not exists ".$trp_rp."admin
(
admin_email varchar(35) NOT NULL,
admin_id int(11) PRIMARY KEY,
admin_name varchar(25) NOT NULL,
passwd varchar(32) NOT NULL,
admin_type varchar(15) NOT NULL,
admin_contact bigint(15) NOT NULL
);";
if(mysql_query($sql1,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating admin table".mysql_error($conn);
}

/*+++++++++++++++++++++++++Lecturer Details+++++++++++++++++++++++++++++ */

$sql2="create table if not exists ".$trp_rp."lecturer
(
lecturer_id bigint(11) PRIMARY KEY,
lecturer_name varchar(25) NOT NULL,
lecturer_passwd varchar(32) NOT NULL,
lecturer_contact bigint(15) NOT NULL,
lecturer_email varchar(35) NOT NULL
);";
if(mysql_query($sql2,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating lecturer table".mysql_error($conn);
}
/*++++++++++++++++++++++++++Course Details++++++++++++++++++++++++++++++ */

$sql3="create table if not exists ".$trp_rp."course
(
course_id bigint(11) primary key,
course_name varchar(50) NOT NULL unique,
course_description varchar(420) NOT NULL,
course_duration varchar(8) NOT NULL
);";

if(mysql_query($sql3,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating course table".mysql_error($conn);
}

/*+++++++++++++++++++++++++++Batch Details++++++++++++++++++++++++++++++*/
$sql4="create table if not exists ".$trp_rp."batch
(
course_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
batch_id bigint(11) primary key,
batch_name varchar(50) NOT NULL,
batch_description varchar(420) NOT NULL
);";

if(mysql_query($sql4,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating course table".mysql_error($conn);
}
/*++++++++++++++++++++++++++++Semester Details++++++++++++++++++++++++++*/

$sql5="create table if not exists ".$trp_rp."semester
(
batch_id bigint(11),
FOREIGN KEY (batch_id) REFERENCES ".$trp_rp."batch(batch_id) ON DELETE SET NULL ON UPDATE CASCADE,
semester_id bigint(11) primary key,
semester_name varchar(25) NOT NULL unique,
semester_comment text NOT NULL,
batch_year int(6) NOT NULL
)";

if(mysql_query($sql5,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating semester table".mysql_error($conn);
}

/*+++++++++++++++++++++++++++Subject Details++++++++++++++++++++++++++++ */
$sql6="create table if not exists ".$trp_rp."subject
(

semester_id bigint(11),
lecturer_id bigint(11),
FOREIGN KEY (lecturer_id) REFERENCES ".$trp_rp."lecturer(lecturer_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (semester_id) REFERENCES ".$trp_rp."semester(semester_id) ON DELETE SET NULL ON UPDATE CASCADE,
subject_id bigint(11) primary key,
subject_name varchar(50) NOT NULL unique,
subject_description varchar(200) NOT NULL,
subject_type varchar(20) NOT NULL,
subject_credit int(1) NOT NULL,
subject_internal_marks float(5,2) NOT NULL,
subject_external_marks float(5,2) NOT NULL
);";

if(mysql_query($sql6,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating subject table".mysql_error($conn);
}

/*++++++++++++++++++++++++++Student, Parent & Guardian Details+++++++++++++++++++++++++++++ */
$sql7="create table if not exists ".$trp_rp."student
(
course_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
student_id bigint(11) primary key,
student_passwd int(32) NOT NULL,
student_name varchar(50) NOT NULL,
student_email varchar(50) NOT NULL unique,
student_contact bigint(15) NOT NULL,
student_gender varchar(7) NOT NULL,
tenth_board varchar(35) NOT NULL,
tenth_mark float(3) NOT NULL,
tenth_percentage float(3) NOT NULL,
tenth_passing_year varchar(4) NOT NULL,
twelve_board varchar(35) NOT NULL,
twelve_mark float(3) NOT NULL,
twelve_percentage float(3) NOT NULL,
twelve_passing_year varchar(4) NOT NULL,
ug_board varchar(35) NULL,
ug_mark float(3) NULL,
ug_percentage float(3) NULL,
ug_passing_year varchar(4) NULL,
parent_name varchar(50) NOT NULL,
parent_contact bigint(15) NOT NULL,
parent_email varchar(30) NOT NULL unique,
parent_address varchar(120) NOT NULL,
guardian_name varchar(50) NOT NULL,
guardian_email varchar(30) NOT  NUll,
guardian_contact bigint(15) NOT  NULL,
guardian_address varchar(120) NOT NULL
);";

if(mysql_query($sql7,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating student table".mysql_error($conn);
} 
/*++++++++++++++++++++++++++++Attendence Detail++++++++++++++++++++++++++++++ */
$sql8="create table if not exists ".$trp_rp."attendence
(
student_id bigint(11),
subject_id bigint(11),
FOREIGN KEY (student_id) REFERENCES ".$trp_rp."student(student_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (subject_id) REFERENCES ".$trp_rp."subject(subject_id) ON DELETE SET NULL ON UPDATE CASCADE,
attendence_id bigint(11) primary key,
lecture_number int(2) NOT NULL,
lecture_present int(2) NOT NULL
);";

if(mysql_query($sql8,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating course table".mysql_error($conn);
}
/*++++++++++++++++++++++++++++Marks Detail++++++++++++++++++++++++++++++*/
$sql9="create table if not exists ".$trp_rp."marks
(
course_id bigint(11),
batch_id bigint(11),
semester_id bigint(11),
subject_id bigint(11),
student_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (batch_id) REFERENCES ".$trp_rp."batch(batch_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (semester_id) REFERENCES ".$trp_rp."semester(semester_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (subject_id) REFERENCES ".$trp_rp."subject(subject_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (student_id) REFERENCES ".$trp_rp."student(student_id) ON DELETE SET NULL ON UPDATE CASCADE,
marks_id bigint(11) primary key,
externalmarks float(2) NOT NULL,
internalmarks float(2) NOT NULL
);";

if(mysql_query($sql9,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating course table".mysql_error($conn);
}
/*+++++++++++++++++++++++++++Contact+++++++++++++++++++++++++++++++++++++*/
$sql10="create table if not exists ".$trp_rp."contact
(
contact_id bigint(11) primary key AUTO_INCREMENT,
contact_name varchar(50) NOT NULL,
contact_email varchar(50) NOT NULL,
contact_number varchar(50) NOT NULL,
contact_subject varchar(50) NOT NULL,
contact_message text NOT NULL
);";

if(mysql_query($sql10,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating course table".mysql_error($conn);
}
/*+++++++++++++++++++++++++++And at Last+++++++++++++++++++++++++++++++++ */
echo"<br>";
if ($var == 10)
	echo "Database is ready....";
else
	echo "Database creation fail....";

mysql_close($conn);
?>

