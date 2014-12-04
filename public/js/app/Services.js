CmsApp.factory('Formulario', ['$resource', function ($resource) {
    return $resource('/api/arquivo/formulários/:id', { id: '@_id'}, {
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
    return $resource('/api/conteudo/notificações/:id', { id: '@_id'}, {
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
    return $resource('/api/arquivo/notificações/:id', { id: '@_id'}, {
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
    return $resource('/api/conteudo/circulares/:id', { id: '@_id'}, {
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
    return $resource('/api/arquivo/circulares/:id', { id: '@_id'}, {
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


CmsApp.factory('Faq', ['$resource', function ($resource) {
    return $resource('/api/conteudo/faq/:id', { id: '@_id'}, {
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

CmsApp.factory('Glossario', ['$resource', function ($resource) {
    return $resource('/api/conteudo/glossário/:id', { id: '@_id'}, {
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

CmsApp.factory('Link', ['$resource', function ($resource) {
    return $resource('/api/links/:id', { id: '@_id'}, {
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

