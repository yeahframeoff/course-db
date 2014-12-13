<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel and Angular Comment System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="public/css/bootstrap-theme.min.css"> <!-- load bootstrap via cdn -->
    <style>
        body 		{ padding-top:30px; }
        form 		{ padding-bottom:20px; }
        .teacher 	{ padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="public/js/jquery-2.1.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/angular.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="public/js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="public/js/services/teacherService.js?v=0"></script> <!-- load our service -->
    <script src="public/js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="courseDbApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Commenting System</h4>
    </div>

    <!-- NEW COMMENT FORM =============================================== -->
    <form ng-submit="submitTeacher()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- NAME -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="name" ng-model="teacherData.name" placeholder="Name">
        </div>

        <!-- NAME2 -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="name2" ng-model="teacherData.name2" placeholder="Second Name">
        </div>

        <!-- SURNAME -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="surname" ng-model="teacherData.surname" placeholder="Last Name">
        </div>

        <!-- DATE OF BIRTH -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="date_of_birth" ng-model="teacherData.date_of_birth" placeholder="Date Of Birth">
        </div>

        <!-- GENDER -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="gender" ng-model="teacherData.gender" placeholder="Gender">
        </div>

        <!-- POSITION -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="position_id" ng-model="teacherData.position_id" placeholder="Position">
        </div>

        <!-- DEPARTMENT -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="department" ng-model="teacherData.department" placeholder="Department">
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <table>
        <thead>
            <th ng-repeat="(key, value) int teachers[0]">{{key}}</th><th></th>
        </thead>
        <tbody>
            <tr ng-repeat="teacher in teachers">
                <td ng-repeat="val in teacher">{{val}}</td>
                <td><a href="#" ng-click="deleteTeacher(teacher.id)" class="text-muted">Delete</a></td>
            </tr>
        </tbody>
    </table>
    <div class="teacher" ng-hide="loading" ng-repeat="teacher in teachers">
        <h3 ng-repeat="(key, value) in teacher">{{key}}: {{value}}</h3>
        <a href="#" ng-click="deleteTeacher(teacher.id)" class="text-muted">Delete</a></p>
    </div>

</div>
</body>
</html>