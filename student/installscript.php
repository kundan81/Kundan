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

/*++++++++++++++++++++++++++++Semester Details++++++++++++++++++++++++++*/

$sql4="create table if not exists ".$trp_rp."semester
(
course_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
semester_id bigint(11) primary key,
semester_name varchar(25) NOT NULL unique,
semester_comment text NOT NULL,
batch_year int(6) NOT NULL
)";

if(mysql_query($sql4,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating semester table".mysql_error($conn);
}

/*+++++++++++++++++++++++++++Subject Details++++++++++++++++++++++++++++ */
$sql5="create table if not exists ".$trp_rp."subject
(
course_id bigint(11),
semester_id bigint(11),
lecturer_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
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

if(mysql_query($sql5,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating subject table".mysql_error($conn);
}

/*++++++++++++++++++++++++++Student Details+++++++++++++++++++++++++++++ */
$sql6="create table if not exists ".$trp_rp."student
(
course_id bigint(11),
semester_id bigint(11),
subject_id bigint(11),
FOREIGN KEY (course_id) REFERENCES ".$trp_rp."course(course_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (semester_id) REFERENCES ".$trp_rp."semester(semester_id) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (subject_id) REFERENCES ".$trp_rp."subject(subject_id) ON DELETE SET NULL ON UPDATE CASCADE,
student_id bigint(11) primary key,
student_passwd int(32) NOT NULL,
student_name varchar(50) NOT NULL,
student_email varchar(50) NOT NULL unique,
student_contact bigint(15) NOT NULL,
student_course varchar(35) NOT NULL,
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
ug_passing_year varchar(4) NULL
);";

if(mysql_query($sql6,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating student table".mysql_error($conn);
}

/*+++++++++++++++++++++Parent & Guardian Details++++++++++++++++++++++++ */
$sql7="create table if not exists ".$trp_rp."parent
(
student_id bigint(11),
FOREIGN KEY (student_id) REFERENCES ".$trp_rp."student(student_id) ON DELETE SET NULL ON UPDATE CASCADE,
parent_id bigint(11) primary key,
parent_name varchar(50) NOT NULL,
parent_contact bigint(15) NOT NULL,
parent_email varchar(30) NOT NULL unique,
parent_address varchar(120) NOT NULL,
guardian_name varchar(50) NULL,
guardian_email varchar(30) NUll,
guardian_contact bigint(15) NULL,
guardian_address varchar(120) NULL
);";

if(mysql_query($sql7,$conn))
	{
		$var += 1; 
	}
else 
{
	echo"<br>";
	echo"Error in creating table".mysql_error($conn);
}


 

echo"<br>";
if ($var == 7)
	echo "Database is ready....";
else
	echo "Database creation fail....";

mysql_close($conn);


?>
