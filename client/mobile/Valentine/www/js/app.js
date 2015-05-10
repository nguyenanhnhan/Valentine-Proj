// Ionic Valentine Project App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('valentine', ['ionic'])

.config(function($stateProvider, $urlRouterProvider) {

  $stateProvider
    .state('signin', {
      url: '/sign-in',
      templateUrl: 'templates/sign-in.html',
      controller: 'SignInCtrl'
    })
    .state('forgotpassword', {
      url: '/forgot-password',
      templateUrl: 'templates/forgot-password.html'
    })
    .state('userinfor',{
      url: '/user-infor',
      templateUrl: 'templates/user-infor.html'
    })
    .state('home', {
      url: '/home',
      templateUrl: 'templates/home.html',
      controller: 'HomeCtrl'
    })
   $urlRouterProvider.otherwise('/sign-in');

})

.controller('SignInCtrl', function($scope, $state) {
  
  $scope.signIn = function(user) {
    console.log('home', user);
    $state.go('home');
  };
  
})

.controller('HomeCtrl', function($scope, $ionicModal){

  $ionicModal.fromTemplateUrl('templates/user-infor.html', {
    scope: $scope,
    // animation: 'slide-in-up'
    // animation: 'scale-in'
    animation: 'zoom-in'
    }).then(function(modal) {
      $scope.modal = modal;
    });
    $scope.userInfor = function() {
      $scope.modal.show();
    };
    $scope.closeUserInfor = function() {
      $scope.modal.hide();
    };
    //Cleanup the modal when we're done with it!
    $scope.$on('$destroy', function() {
      $scope.modal.remove();
    });
    // Execute action on hide modal
    $scope.$on('modal.hidden', function() {
      // Execute action
    });
    // Execute action on remove modal
    $scope.$on('modal.removed', function() {
      // Execute action
    });
});

/*.controller('HomeCtrl', function($scope, $ionicPopup, $timeout){
  $scope.userInfor = function() {
    var alertPopup = $ionicPopup.alert({
     title: 'Account Information',
     template: 'BI Warehouse: <strong>db.thanhtrucco.com</strong>'
   });
   alertPopup.then(function(res) {
     console.log('Thank you for not eating my delicious ice cream cone');
   });
  };
});*/