CmsApp.factory('Corretor', ['$resource', function ($resource) {
	return $resource('/api/corretores/:id', { id: '@_id'}, {
		update: {
			method: 'PUT',
            isArray: false,

		},
		get: {
            method:'GET',
        },
        delete: {
        	method: 'DELETE',
        },
        save: {
        	method: 'POST',
            isArray: false 
        },
        query: {
        	method: 'GET', 
        	isArray: false 
        }
	})
}]);

CmsApp.factory('Formulario', ['$resource', function ($resource) {
    return $resource('/api/arquivo/formulario/:id', { id: '@_id'}, {
        update: {
            method: 'PUT',
            isArray: false,

        },
        get: {
            method:'GET',
        },
        delete: {
            method: 'DELETE',
        },
        save: {
            method: 'POST',
            isArray: false 
        },
        query: {
            method: 'GET', 
            isArray: false 
        }
    })
}]);

CmsApp.factory('Notificacao', ['$resource', function ($resource) {
    return $resource('/api/conteudo/notificacao/:id', { id: '@_id'}, {
        update: {
            method: 'PUT',
            isArray: false,

        },
        get: {
            method:'GET',
        },
        delete: {
            method: 'DELETE',
        },
        save: {
            method: 'POST',
            isArray: false 
        },
        query: {
            method: 'GET', 
            isArray: false 
        }
    })
}]);

CmsApp.factory('NotificacaoArquivo', ['$resource', function ($resource) {
    return $resource('/api/arquivo/notificacao/:id', { id: '@_id'}, {
        update: {
            method: 'PUT',
            isArray: false,

        },
        get: {
            method:'GET',
        },
        delete: {
            method: 'DELETE',
        },
        save: {
            method: 'POST',
            isArray: false 
        },
        query: {
            method: 'GET', 
            isArray: false 
        }
    })
}]);


CmsApp.factory('Circular', ['$resource', function ($resource) {
    return $resource('/api/conteudo/circular/:id', { id: '@_id'}, {
        update: {
            method: 'PUT',
            isArray: false,

        },
        get: {
            method:'GET',
        },
        delete: {
            method: 'DELETE',
        },
        save: {
            method: 'POST',
            isArray: false 
        },
        query: {
            method: 'GET', 
            isArray: false 
        }
    })
}]);

CmsApp.factory('CircularArquivo', ['$resource', function ($resource) {
    return $resource('/api/arquivo/circular/:id', { id: '@_id'}, {
        update: {
            method: 'PUT',
            isArray: false,

        },
        get: {
            method:'GET',
        },
        delete: {
            method: 'DELETE',
        },
        save: {
            method: 'POST',
            isArray: false 
        },
        query: {
            method: 'GET', 
            isArray: false 
        }
    })
}])