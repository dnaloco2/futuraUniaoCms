CmsApp.controller('RouteCtrl', ['$scope',  '$location', function ($scope, $location) {

	$scope.location = $location;

	$scope.$watch('location.path()', function(path) {

	  $scope.isContent = path.indexOf('content') > -1;
	  $scope.isUser = path.indexOf('users') > -1;
	  $scope.isAdmin = path.indexOf('admin') > -1;
	});
}]);

CmsApp.controller('CorretoresCtrl', ['$scope', 'Corretor', '$location', function ($scope, Corretor, $location) {
	$scope.corretores = [];

	$scope.showErroUnique = false;

	$scope.cadastronovo = {};

	$scope.setNova = true;

	$scope.corretor = {};
	$scope.corretor.telefones = [];

	$scope.corretor.telefones[0] = {num: null, tipo: null};
	$scope.corretor.telefones[1] = {num: null, tipo: null};
	$scope.corretor.telefones[2] = {num: null, tipo: null};

	$scope.enderecoFoto = '/img/corretores/sem-foto.png';

	var passFirstVC = false, passFirstVA = false;

	var resetCorretor = function () {
		$scope.showErroUnique = false;
		$scope.enviandoForm = false;

		$scope.corretor = {};
		$scope.corretor.telefones = [];

		$scope.corretor.telefones[0] = {num: null, tipo: null};
		$scope.corretor.telefones[1] = {num: null, tipo: null};
		$scope.corretor.telefones[2] = {num: null, tipo: null};

		passFirstVC = false, passFirstVA = false;
	}

	var resetForm = function() {
        $scope.myForm.$setPristine();

        $('#escolherFotoCorretor').val('');

        resetCorretor();
        $location.path('/admin/content/corretores');
    };

	/* Variaveis */
	$scope.loading = true;

	$scope.areas = [
		{nome: 'DIRETORIA COMERCIAL'},
		{nome: 'EQUIPE OPERACIONAL SAÚDE / PME / EMPRESARIAL / ADESÃO / VIDA E PREVIDÊNCIA'},
		{nome: 'EQUIPE OPERACIONAL AUTO / R.E / TRANSPORTES'},
		{nome: 'EQUIPE COMERCIAL'},
		{nome: 'ADMINISTRATIVO'},
	];

	$scope.cargos = [
		{nome: 'Diretor Comercial'},
		{nome: 'Diretor Comercial'},
		{nome: 'Diretor de Unidade'},
		{nome: 'Diretor de Transportes / RE'},
		{nome: 'Saúde e Benefícios'},
		{nome: 'Atendimento Interno e Adesão'},
		{nome: 'Atendimento Interno'},
		{nome: 'Coordenadoria Vendas e Negócios'},
		{nome: 'Área Técnica / Operacional'},
		{nome: 'Comunicação e Marketing '},
		{nome: 'Assistência Jurídica'},
		{nome: 'Atendimento Interno'},
	];

	$scope.filiais = [
		{nome: 'Comercial Unidade'},
		{nome: 'Filial Centro'},
		{nome: 'Filial Leste'},
		{nome: 'Filial Santos'},
		{nome: 'Filial ABC'},
		{nome: 'Matriz'},
	];

	// 'telefone', 'celular', 'fax'
	$scope.tipos = [
		{nome: 'telefone'},
		{nome: 'celular'},
		{nome: 'fax'},
	];

	/* Funcoes */

	var arrayObjectIndexOf = function(myArray, searchTerm, property) {
	    for(var i = 0, len = myArray.length; i < len; i++) {
	        if (myArray[i][property] === searchTerm) return i;
	    }
	    return -1;
	}

	var loadCorretores = (function() {
		$scope.loading = true;
		var corretores = Corretor.query(function () {
			$scope.loading = false;

			for ( key in corretores.data ) {
				$scope.corretores.push( corretores.data[key] );
			}
		});
	})();

	$scope.teste = function () {

	}

	/*var validateCargo = function (scope) {

		if (passFirstVC) {
			if ( $scope.cargos.indexOf(scope) > -1 ) {
				$scope.myForm.cargo.$setValidity('required', true);
			} else {
				$scope.myForm.cargo.$setValidity('required', false);
			}
		}

		passFirstVC = true;
	};

	var validateArea = function (scope) {
		
		if (passFirstVA) {
			if ( $scope.areas.indexOf(scope) > -1 ) {
				$scope.myForm.area.$setValidity('required', true);
			} else {
				$scope.myForm.area.$setValidity('required', false);
			}
			
		}

		passFirstVA = true;
	}

	$scope.$watch('corretor.area', function (scope) {
		validateArea(scope);
	});

	$scope.$watch('corretor.cargo', function (scope) {
		validateCargo(scope);
	});*/

	$scope.$watch('corretor.foto', function (scope) {
		if (scope !== undefined || scope === '') {

			$scope.setNova = false;

		}
	})

	$scope.$watch('showErroUnique', function (scope) {
		if (scope) {
			$scope.myForm.email.$setValidity('unique', true);
		} else {
			$scope.myForm.email.$setValidity('unique', false);
		}
	});

	$scope.createForm = function (isValid) {

		// validateArea($scope.corretor.area);
		// validateCargo($scope.corretor.cargo);

		if (isValid) {
			$(".btn-enviar-form" ).attr("disabled", 'disabled');
			$(".btn-enviar-form" ).text('Enviando Dados...Aguarde!');


			var data = Corretor.save($scope.corretor,
				// 200
				function () {

					if (data.data.success) {

						$scope.cadastronovo = data.data.corretor;

						$scope.corretores.push( $scope.cadastronovo );

						$("#corretorCadastrado").show().delay(5000).fadeOut();
					}

					resetForm();
					$(".btn-enviar-form" ).removeAttr("disabled");
					$(".btn-enviar-form" ).text('Cadastrar');

				}, 
				// erro
				function () {

					console.log('ERRO ', data);
				});
		}
		
	};

	$scope.removeCorretorTabela = function (idCorretor) {
		var index = arrayObjectIndexOf( $scope.corretores, idCorretor, 'id' );
	    $scope.corretores.splice(index, 1);
	}

	$scope.editarCorretorTabela = function (idCorretor, corretorEditado) {
		var index = arrayObjectIndexOf( $scope.corretores, idCorretor, 'id' );

		$scope.corretores[index] = corretorEditado;
	}

	$scope.saveForm = function (isValid) {

		// validateArea($scope.corretor.area);
		// validateCargo($scope.corretor.cargo);

		if (isValid) {
			$(".btn-enviar-form" ).attr("disabled", 'disabled');
			$(".btn-enviar-form" ).text('Enviando Dados...Aguarde!');


			var data = Corretor.update({id: $scope.corretor.id} , $scope.corretor,
				// 200
				function () {

					console.log(data);

					if (data.data.success) {
						$scope.cadastronovo = data.data.corretor;

						$scope.editarCorretorTabela($scope.corretor.id, $scope.cadastronovo);

						$("#corretorCadastrado").show().delay(5000).fadeOut();
					}

					resetForm();
					$(".btn-enviar-form" ).removeAttr("disabled");
					$(".btn-enviar-form" ).text('Cadastrar');

				}, 
				// erro
				function () {

					console.log('ERRO ', data);
				});
		}
		
	};

	$scope.$watch('location.path()', function(path) {
		var splittedPath = path.split("/");
		var indexAction;

		if (path.indexOf('delete') > -1) {
			indexAction = splittedPath.lastIndexOf('delete');
			if ( indexAction > -1 ) {
				if ( splittedPath[indexAction + 1] !== undefined ) {
					var idC = splittedPath[indexAction + 1];

					
			        decisao = confirm("Tem certeza de que deseja cancelar o colaborador ID: " + idC + " !");

					if (decisao){
					    $.blockUI({ 
				            message: '<h3>Aguarde um momento, estou excluindo o colaborador.</h3>',
				            css: { width: '300px' } 
				        }); 

					    var data = Corretor.delete( { id: idC }, 
					    	function () {
					    		console.log(data);
					    		$scope.removeCorretorTabela(idC);
					    		setTimeout($.unblockUI, 1);
					    	}
					    )
					}
				}				
			}
		}

		if (path.indexOf('edit') > -1) {
			indexAction = splittedPath.lastIndexOf('edit');
			if ( indexAction > -1 ) {
				if ( splittedPath[indexAction + 1] !== undefined ) {
					 var idC = splittedPath[indexAction + 1];

					$.blockUI({ 
			            message: '<h3>Aguarde um momento, estou buscando o colaborador.</h3>',
			            css: { width: '300px' } 
			        }); 

					var data = Corretor.get( {id: idC }, 
						// 200
						function () {
							var dataC = data.data;

							console.log('200 ', data);

							setTimeout($.unblockUI, 1);

							$scope.corretor.id =  dataC.id;
							$scope.corretor.nome = dataC.nome;

							$scope.enderecoFoto = dataC.foto;

							if (dataC.foto == null) {
								$scope.enderecoFoto = '/img/corretores/sem-foto.png';
							} else {
								$scope.enderecoFoto = dataC.foto;
							}

							var idxArea = arrayObjectIndexOf( $scope.areas, dataC.area, 'nome' );
							$scope.corretor.area = $scope.areas[idxArea];

							var idxCargo = arrayObjectIndexOf( $scope.cargos, dataC.cargo, 'nome' );
							$scope.corretor.cargo = $scope.cargos[idxCargo];

							var idxFilial = arrayObjectIndexOf( $scope.filiais, dataC.filial, 'nome' );
							$scope.corretor.filial = $scope.filiais[idxFilial];

							$scope.corretor.email = dataC.email;

							for (var i = 0; i < dataC.telefones.length; i += 1) {
								$scope.corretor.telefones[i] = dataC.telefones[i];
							}

							$('html,body').animate({scrollTop: 0}, 400);

						}, 
						// erro
						function () {

							console.log('ERRO ', data);
							setTimeout($.unblockUI, 1000);

						});

				}				
			}
		}

	});

}]);

/*
CmsApp.controller('ArquivosCtrl', ['$scope',  function ( $scope ) {
	
	$scope.checked_expirar = true;

	$scope.data_expirar = '';

	$scope.formIsInvalid = true;

	var checked = false

	$scope.$watch('checked_expirar', function (scope) {

		if ( scope ) {

			$scope.post.expiresAt.$setValidity('required', true);

		} else {
			
			if ( $scope.expiresAt == 'undefined' || $scope.expiresAt == null) {

				$scope.post.expiresAt.$setValidity('required', false);
			} else {
				$scope.data_expirar = $scope.post.expiresAt;
				$scope.post.expiresAt.$setValidity('required', true);
			}
		}

	});

	$scope.$watch('post.$invalid', function (scope) {
		$scope.formIsInvalid = scope;
	})

	$scope.$watch('expiresAt', function (scope) {

		if ( scope == 'undefined' || scope == null) {

			if ( $scope.checked_expirar ) {
				if (checked) {
					$scope.post.expiresAt.$setValidity('required', false);
				}
				checked = true;
			} else {
				$scope.data_expirar = scope;
				$scope.post.expiresAt.$setValidity('required', true);
			}
			
		} else {
			$scope.data_expirar = scope;
			$scope.post.expiresAt.$setValidity('required', true);
		}

	});

/*	$scope.$watch('upload', function (scope) {
		console.log(scope);
		if ( scope == 'undefined' || scope == null) {
			$scope.post.arquivo.$setValidity('required', false);
		} else {
			$scope.post.arquivo.$setValidity('required', true);
		}

	});

}]);

*/

/*CmsApp.controller('LinksCtrl', ['$scope', 'ngTableParams', 'Link', function($scope, ngTableParams, Link) {
	$scope.links = [];

	var loadLinks = ( function() {

		$scope.loadingLinks = true;
		var links = Link.query( function () {
			

			var data = $.map(links.data, function(el) { return el; });

			$scope.tableParams = new ngTableParams({
		        page: 1,            // show first page
		        count: 5         	// count per page
		    }, {
		        total: data.length, // length of data
		        getData: function($defer, params) {
		            $defer.resolve(data.slice((params.page() - 1) * params.count(), params.page() * params.count()));
		        }
		    });

		    $scope.loadingLinks = false;
			
		});
		
	})();
}]);*/

CmsApp.controller('FaqCtrl', ['$scope', 'Faq', '$sce', function($scope, Faq, $sce) {
	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.faqs = [];

	$scope.renderHtml = function(html_code) {
	    return $sce.trustAsHtml(html_code);
	};

	var loadFaqs = ( function() {

		$scope.loadingFaqs = true;
		var faqs = Faq.query( function () {
			

			var data = $.map(faqs.data, function(el) { return el; });

			$scope.faqs = data;

			$scope.loadingFaqs = false;

		});
		
	})();

}]);

CmsApp.controller('CorretoresCtrl', ['$scope', 'Corretor', function($scope, Corretor) {
	$scope.currentPage = 1;
  	$scope.pageSize = 5;
	$scope.corretores = [];

	var loadCorretores = ( function() {

		$scope.loadingCorretores = true;

		var corretores = Corretor.query( function () {
		
			var data = $.map(corretores.data, function(el) { return el; });

			$scope.corretores = data;

			$scope.loadingCorretores = false;

		});
		
	})();
}]);

/*CmsApp.controller('FormulariosCtrl', ['$scope', 'Formulario', function ($scope, Formulario) {
	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.formularios = [];

	var loadFormularios = ( function() {

		$scope.loadingFormularios = true;

		var formularios = Formulario.query( function () {

			var data = $.map(formularios.data, function(el) { return el; });

			$scope.formularios = data;

			$scope.loadingFormularios = false;

		});
		
	})();
}]);*/	

/*CmsApp.controller('NotificacoesCtrl', ['$scope', 'Notificacao', 'NotificacaoArquivo', function ($scope, Notificacao, NotificacaoArquivo) {
	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.notificacoes = [];

	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.notificacoesArquivos = [];

	var loadNotificacoes = ( function() {

		$scope.loadingNotificacoes = true;
		
		var notificacoes = Notificacao.query( function () {
			

			var data = $.map(notificacoes.data, function(el) { return el; });

			$scope.notificacoes = data;

			console.log(data);

			$scope.loadingNotificacoes = false;

		});
		
	})();

	$scope.currentPageArquivos = 1;
  	$scope.pageSizeArquivos = 10;
	$scope.notificacoesArquivos = [];

	var loadNotificacoesArquivos = ( function () {
		$scope.loadingNotificacoesArquivos = true;

		var notificacoesArquivos = NotificacaoArquivo.query( function () {
			

			var data = $.map(notificacoesArquivos.data, function(el) { return el; });

			$scope.notificacoesArquivos = data;

			$scope.loadingNotificacoesArquivos = false;

		});

	})();
}]);*/

CmsApp.controller('CircularesCtrl', ['$scope', 'Circular', 'CircularArquivo', function ($scope, Circular, CircularArquivo) {
	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.circulares = [];

	var loadCirculares = ( function() {

		$scope.loadingCirculares = true;
		
		var circulares = Circular.query( function () {
			
			var data = $.map(circulares.data, function(el) { return el; });

			$scope.circulares = data;

			$scope.loadingCirculares = false;

		});
		
	})();

	$scope.currentPageArquivos = 1;
  	$scope.pageSizeArquivos = 10;
	$scope.circularesArquivos = [];

	var loadCircularesArquivos = ( function () {
		$scope.loadingCircularesArquivos = true;

		var circularesArquivos = CircularArquivo.query( function () {
			

			var data = $.map(circularesArquivos.data, function(el) { return el; });

			$scope.circularesArquivos = data;

			$scope.loadingCircularesArquivos = false;

		});

	})();
}]);



CmsApp.controller('GlossarioCtrl', ['$scope', 'Glossario', '$sce', function($scope, Glossario, $sce) {
	$scope.currentPage = 1;
  	$scope.pageSize = 10;
	$scope.glossario = [];

	$scope.renderHtml = function(html_code) {
	    return $sce.trustAsHtml(html_code);
	};

	var loadGlossario = ( function() {

		$scope.loadinGlossario = true;
		
		var glossario = Glossario.query( function () {

			var data = $.map(glossario.data, function(el) { return el; });

			$scope.glossario = data;

			$scope.loadinGlossario = false;

		});
		
	})();
}]);

CmsApp.controller('FormContatoCtrl', ['$scope', '$http', function($scope, $http) {
	$scope.result = 'hidden'
    $scope.resultMessage;
    $scope.formData; //formData is an object holding the name, email, subject, and message
    $scope.submitButtonDisabled = false;
    $scope.submitted = false; //used so that form errors are shown only after the form has been submitted
    $scope.submit = function(contactform) {
        $scope.submitted = true;
        $scope.submitButtonDisabled = true;
        if (contactform.$valid) {

            $http({
                method  : 'POST',
                url     : '/api/formcontato',
                data    : $.param($scope.formData),  //param method from jQuery
                headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  //set the headers so angular passing info as form data (not request payload)
            }).success(function(data){

                if (data.success) { //success comes from the return json object

                    $scope.submitButtonDisabled = true;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-success';
                } else {

                    $scope.submitButtonDisabled = false;
                    $scope.resultMessage = data.message;
                    $scope.result='bg-danger';
                }
            }).error(function(data) {
            	console.log('ERROR',data);
            });

            $scope.submitButtonDisabled = false;
            $scope.resultMessage = 'Failed <img src="http://www.chaosm.net/blog/wp-includes/images/smilies/icon_sad.gif" alt=":(" class="wp-smiley">  Please fill out all the fields.';
            $scope.result='bg-danger';
        }
    }
}]);