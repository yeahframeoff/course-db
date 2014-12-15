<!doctype html>
<html lang="en" ng-app="courseDbApp">
<head>
    <?php include 'header.php'; ?>
</head>
<!-- declare our angular app and controller -->
<body class="container" ng-controller="mainController">
<div class="col-md-10 col-md-offset-1">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Commenting System</h4>
    </div>
    
    <div class="row">
        <select class="form-control" ng-model="table"
                ng-change="theForm.$dirty && promptSave(); changeTable(table)">
            <option></option>
            <option>teachers</option>
            <option>curriculums</option>
            <option>curriculum_types</option>
            <option>teachers_curriculums</option>
            <option>subjects</option>
            <option>positions</option>
        </select>
    </div>
    
    <form ng-submit="submitEntry()" name="theForm">
        <div ng-if="table">
            <ng-include src="htmlRoot + formUrl"></ng-include>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </div>
    </form>
       
    <table class="table table-striped" ng-if="entries.length">
        <thead>
            <th ng-repeat="key in dataKeys">{{key}}</th><th></th>
        </thead>
        <tbody>
            <tr ng-repeat="entry in entries">
                <td ng-repeat="key in dataKeys">{{entry[key]}}</td>
                <td><a href="#" ng-click="deleteEntry(entry.id)" class="text-muted">Delete</a></td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>