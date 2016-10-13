angular.module('inspinia')
	.factory('dataservice',['$http',dataservice]);

function dataservice($http){
	return{
		getLegalEntity : getLegalEntity,
		createLegalEntity : createLegalEntity,
		updateLegalEntity : updateLegalEntity,
		deleteLegalEntity : deleteLegalEntity
	};


	function getLegalEntity(id){
		var webApiUrl = webApiUrlBase + "/legalentity/get?lentId=" + id;
		return $http.get(webApiUrl);
	}

	function createLegalEntity(lgEntity){
		var webApiUrl = webApiUrlBase + "/legalentity/create";
		return $http.post(webApiUrl,lgEntity);
	}

	function updateLegalEntity(lgEntity){
		var webApiUrl = webApiUrlBase + "/legalentity/update";
		return $http.post(webApiUrl,lgEntity);
	}

	function deleteLegalEntity(lgEntity){
		var webApiUrl = webApiUrlBase + "/legalentity/delete";
		return $http.post(webApiUrl,lgEntity);
	}
}
