<?php
include "config.php";
?>
<!-- Introduction -->


<div class="row">
  <article class="col-xs-12 col-lg-10 col-lg-offset-1">
    <p>
      <h2></h2>
      Welcome to my open source Planning Poker® web app. Use of this app is free of charge for everyone. As a scrum master just start a named session 
      and invite your team to join you. It is recommended to display the scrum master view on the big screen (TV or projector) and let everyone else 
      join via smartphone. To join a session just enter the id displayed in the heading of the scrum master view or use the QR-Code.
    </p>

    <p>
      This app is hosted by Prodyna Cloud, take a look at our academy for <a href="https://training.prodyna.com/">trainings</a>.
      <div class="col-md-4 col-sm-4 col-xs-4">
      </div>

        <div class="center">
            <a  href="https://training.prodyna.com/training" role="button">
            <img class="visible-lg" src="/image/PRODYNA_Logo_anthracit_gruen_rgb.png" width="550" height="100" />
            <img class="visible-md" src="/image/PRODYNA_Logo_anthracit_gruen_rgb.png" width="440" height="80" />
            <img class="visible-sm" src="/image/PRODYNA_Logo_anthracit_gruen_rgb.png" width="330" height="60" />
            <img class="visible-xs" src="/image/PRODYNA_Logo_anthracit_gruen_rgb.png" width="220" height="40" />
            </a>
        </div>

    </p>

  </article>
</div>
            
<div class="row">
  <h2 class="col-xs-12 col-lg-10 col-lg-offset-1">Create or join a session</h2>
      
  <!-- Create session panel -->
  <div class="col-xs-12 col-sm-6 col-lg-5 col-lg-offset-1" ng-controller="CreateController as create">
    <div class="panel panel-default">
      <div class="panel-heading">Create session</div>
      <div class="panel-body">  
        <form role="form">
          <div class="form-group" ng-class="{'has-error': create.nameError}">
            <label for="sessionName">Session name:</label>
            <div class="has-feedback">
              <input type="text" class="form-control" ng-model="create.name" placeholder="My session">
              <span ng-if="create.nameError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group">
            <label>Cards: <a target="_blank" href="<?= $src ?>/src/sample-config.php#L17">?</a></label>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                <span ng-bind-html="create.selectedSet.value"></span>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li ng-repeat="set in create.cardSets" ng-class="{'active': set == create.selectedSet}">
                  <a class="selectable" ng-click="create.selectedSet = set" ng-bind-html="set.value"></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="form-group">
            <label><input type="checkbox" ng-model="create.isPrivate"> is private</label> 
          </div>
          <div class="form-group" ng-if="create.isPrivate" ng-class="{'has-error': create.pwdError}">
            <label for="password">Password:</label>
            <div class="has-feedback">
              <input type="password" class="form-control" ng-model="create.password">
              <span ng-if="create.pwdError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <input type="button" class="btn btn-default" value="Create" ng-click="create.createSession()">
        </form>
      </div>
    </div>        
  </div>
            
  <!-- Join session panel -->
  <div class="col-xs-12 col-sm-6 col-lg-5" ng-controller="JoinController as join">
    <div class="panel panel-default">
      <div class="panel-heading">Join session</div>
      <div class="panel-body">
        <form role="form">
          <div class="form-group" ng-class="{'has-error': join.idError}">
            <label>Session id:</label>
            <div class="has-feedback">
              <input type="text" class="form-control" ng-model="join.id" ng-change="join.passwordCheck()" placeholder="4711">
              <span ng-if="join.idError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group" ng-class="{'has-error': join.nameError}">
            <label>Your name:</label>
            <div class="has-feedback" ng-init="join.name = '<?= isset($_COOKIE['scrum_member_name']) ? $_COOKIE['scrum_member_name'] : "" ?>'">
              <input type="text" class="form-control"  ng-model="join.name" placeholder="John">
              <span ng-if="join.nameError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <div class="form-group" ng-if="join.requiresPassword">
            <label>Password:</label>
            <div class="has-feedback">
              <input type="password" class="form-control"  ng-model="join.password">
              <span ng-if="join.passwordError" class="glyphicon glyphicon-remove form-control-feedback"></span>
            </div>
          </div>
          <input type="button" class="btn btn-default" value="Join" ng-click="join.joinSession()">
       </form>
      </div>
    </div>        
  </div>

</div>


<div class="jumbotron">
   <h2> Training courses for your success  by Prodyna Academy </h2>
  <p>
   We continuously extend our portfolio of training. If you have specific training requests, please contact us to get a customized training offer.
  </p>

    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="/image/Scrum_Logo_inkl_Bild.jpg" alt="prodyna_scrum">
          <div class="caption">
            <h3>Scrum Training</h3>
            <p>Scrum as most commonly used framework for agile approaches guides your business to react to changes and use
            them to your benefit efficiently. Do you want to know how Scrum works?
            Then join our Scrum training courses Scrum Master, Scrum Product Owner, Scrum Developer or simply Scrum Basics. </p>
            <p><a href="https://training.prodyna.com/en/scrum" class="btn btn-primary" role="button">Scrum Trainings</a> <a href="https://training.prodyna.com/en/training" class="btn btn-default" role="button">All Trainings</a></p>
          </div>
        </div>
      </div>
       <div class="col-sm-6 col-md-4">
              <div class="thumbnail">
                <img src="/image/Kubernetes_Logo_inkl_Bild.jpg" alt="prodyna_kube">
                <div class="caption">
                  <h3>Kubernetes Training</h3>
                  <p>Linux Containers and Kubernetes are key technologies for modern cloud native application landscapes. To leverage the full power of Kubernetes,
                   a solid understanding of the architecture and the main concepts is imperative.
                    We will give you the theoretical basis combined with extensive hands-on exercises to ensure a successful application in your projects.
                </p>
            <p><a href="https://training.prodyna.com/en/kubernetes" class="btn btn-primary" role="button">Kubernetes Training</a> <a href="https://training.prodyna.com/en/training" class="btn btn-default" role="button">All Trainings</a></p>
                </div>
              </div>
        </div>
     <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="/image/IREB_Logo_inkl_Bild_neu.jpg" alt="prodyna_IREB">
              <div class="caption">
                <h3>Requirements Engineering</h3>
                <p>Efficient Requirements Engineering provides the foundation for high-quality and high-performance system development.
                 Your knowledge of professional requirements analysis and
                requirements management contributes vitally to customer satisfaction and successful project realization. </p>
            <p><a href="https://training.prodyna.com/en/cpre-requirements-engineering" class="btn btn-primary" role="button">Requirements Eng. Training</a> <a href="https://training.prodyna.com/en/training" class="btn btn-default" role="button">All Trainings</a></p>
              </div>
            </div>
          </div>
    </div>



</div>