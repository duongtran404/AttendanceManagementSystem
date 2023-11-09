<?php

use App\Model\Class_;
use App\Model\Lesson;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

    // STUDENT
    Breadcrumbs::for("student", function ($trial) {
        $trial->push("Students", route('student'));
    });
    Breadcrumbs::for('new student', function ($trial) {
        $trial->parent('student');
        $trial->push('New student', route('createStudent'));
    });
    Breadcrumbs::for('statistical', function ($trial) {
        $trial->parent('student');
        $trial->push('Statistical', route('status-statistical'));
    });
    Breadcrumbs::for('edit student', function ($trial,$id) {
        $trial->parent('student');
        $trial->push('Edit', route('editStudent', $id));
    });
    Breadcrumbs::for('archive student', function ($trial) {
        $trial->parent('student');
        $trial->push('Archive', route('archiveStudent'));
    });

    // TEACHER
    Breadcrumbs::for('teacher', function ($trial) {
        $trial->push('Teachers', route('teacher'));
    });
    Breadcrumbs::for('new teacher', function ($trial) {
        $trial->parent('teacher');
        $trial->push('New Teacher', route('createTeacher'));
    });
    Breadcrumbs::for('edit teacher', function ($trial,$id) {
        $trial->parent('teacher');
        $trial->push('Edit', route('editTeacher',$id));
    });
    Breadcrumbs::for('archive teacher', function ($trial) {
        $trial->parent('teacher');
        $trial->push('Archive', route('archiveTeacher'));
    });

    // CLASS
    Breadcrumbs::for('class', function ($trial) {
        $trial->push('Class', route('class'));
    });
    Breadcrumbs::for('new class', function ($trial) {
        $trial->parent('class');
        $trial->push('New Class', route('createClass'));
    });
    Breadcrumbs::for('archive class', function ($trial) {
        $trial->parent('class');
        $trial->push('Archive', route('archiveClass'));
    });
    Breadcrumbs::for('edit class', function ($trial,$id) {
        $trial->parent('class');
        $trial->push('Edit', route('editClass',$id));
    });
    Breadcrumbs::for('new lesson', function ($trial,$id) {
        $trial->parent('class');
        $trial->push('New lesson', route('createLesson',$id));
    });
    Breadcrumbs::for('schedule', function ($trial,$id){
        $trial->parent('class');
        $trial->push('Schedule', route('lesson',$id));
    });
    Breadcrumbs::for('edit lesson', function ($trial,$id) {
        $lesson = Lesson::findOrFail($id);
        $trial->parent('schedule',$lesson->class_id );
        $trial->push('Edit', route('editLesson',$id));
    });
    Breadcrumbs::for('attendance', function ($trial,$id) {
        $lesson = Lesson::findOrFail($id);
        $trial->parent('schedule',$lesson->class_id );
        $trial->push('Attendance', route('attendance',$id));
    });
    Breadcrumbs::for('archive lesson', function ($trial,$id) {
        $lesson = Lesson::findOrFail($id);
        $trial->parent('schedule',$lesson->class_id );
        $trial->push('Archive lesson', route('archiveLesson',$id));
    });
    Breadcrumbs::for('class member', function ($trial,$id) {
        $trial->parent('class');
        $trial->push('Class member', route('class_member',$id));
    });
    Breadcrumbs::for('add member', function ($trial,$id) {
        $class = Class_::findOrFail($id);
        $trial->parent('class member', $class->id );
        $trial->push('Add member', route('student-list',$id));
    });

    //Subject
    Breadcrumbs::for('subject', function ($trial) {
        $trial->push('Subject', route('subject'));
    });
    Breadcrumbs::for('new subject', function ($trial) {
        $trial->parent('subject');
        $trial->push('New Subject', route('createSubject'));
    });
    Breadcrumbs::for('edit subject', function ($trial,$id) {
        $trial->parent('subject');
        $trial->push('Edit subject', route('editSubject',$id));
    });

    //attendance report
    Breadcrumbs::for('attendance report', function ($trial) {
        // $trial->parent('');
        $trial->push('Attendance report', route('classReport'));
    });
    Breadcrumbs::for('attendance list', function ($trial,$id) {
        $trial->parent('attendance report');
        $trial->push('Attendance list', route('lessonReport',$id));
    });
    Breadcrumbs::for('view attendance', function ($trial,$id) {
        $class = Class_::findOrFail($id);
        $trial->parent('attendance list',$class->id);
        $trial->push('View Attendance', route('viewAttendance',$id));
    });
    Breadcrumbs::for('attendance statistical', function ($trial,$id) {
        $trial->parent('attendance report');
        $trial->push('Attendance statistical', route('attendance-statistical',$id));
    });
