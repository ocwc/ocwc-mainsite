var app = angular.module("ninjaResultApp", ['ngSanitize'])
    .filter('to_trusted', ['$sce', '$filter', function($sce, $filter){
        return function(text) {
        	var html = $filter('linky')(text, '_blank');
            return $sce.trustAsHtml(html);
        };
    }]);

app.controller('NinjaResultController', ['$scope', function($scope) {
	$scope.entries = ninja_form_entries;

	$scope.categories = [
		'Individual - Leadership',
		'Individual - Educator',
		'Outstanding Site',
		'Outstanding Course',
		'Open MOOC',
		'Creative Innovation',
		'Engagement',
		'Open Research'
	];

	$scope.selectedCategory = [];
	$scope.toggleCategory = function(category) {
		var index = $scope.selectedCategory.indexOf(category);
	    if (index === -1) {
	        $scope.selectedCategory.push(category);
	    } else {
	        $scope.selectedCategory.splice(index, 1);
	    }
	}
	$scope.hasSelectedCategory = function(entry) {
		for (var i = entry.items.length - 1; i >= 0; i--) {
			var field = entry.items[i];
			if ( field.label === "Category of Award ") {
				return $scope.selectedCategory.indexOf(field.value) >= 0;
			}
		};
	}

	$scope.showDesc = function(field) {
		return field.type === '_desc';
	}

	$scope.showText = function(field) {
		return field.type === '_text';	
	}

	$scope.showTextArea = function(field) {
		return field.type === '_textarea';
	}

	$scope.showList = function(field) {
		return field.type === '_list';	
	}

	$scope.showUpload = function(field) {
		return field.type === '_upload';	
	}

	$scope.getHeaderType = function(field) {
		return 'field-type-'+field.type.substr(1);
	}
}]);