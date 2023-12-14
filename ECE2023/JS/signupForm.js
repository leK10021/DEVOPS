let formTeacher = document.querySelector(".formTeacher"); 
let formStudent = document.querySelector(".formStudent"); 
let selectTeacher = document.querySelector(".selectTeacher"); 
let selectStudent = document.querySelector(".selectStudent"); 
let underlineTeacher = document.querySelector(".underlineTeacher"); 
let underlineStudent = document.querySelector(".underlineStudent");
let student = document.querySelector(".student"); 
let teacher = document.querySelector(".teacher");

selectTeacher.addEventListener("click", function(){
    formTeacher.style.opacity = "1";
    formStudent.style.opacity = "0";
    formStudent.style.zIndex = "0";
    underlineTeacher.style.backgroundColor = "#2fced4"
    underlineStudent.style.backgroundColor = "#2fced400";
    teacher.style.color = "#2fced4";
    student.style.color = "whitesmoke";




})

selectStudent.addEventListener("click", function(){
    formStudent.style.opacity = "1";
    formTeacher.style.opacity = "0";
    formTeacher.style.zIndex = "0";
    underlineStudent.style.backgroundColor = "#2fced4"
    underlineTeacher.style.backgroundColor = "#2fced400";
    student.style.color = "#2fced4";
    teacher.style.color = "whitesmoke";


})