<!-- O meu head -->
@include('layouts.admin.head')

<body class="sb-nav-fixed">
    
    <!-- a minha NavBar -->
    @include('layouts.admin.navbar')

    <!-- Layout principal com menu lateral e conteúdo -->
    <div id="layoutSidenav">
      
      @if(Auth::check())
        @php
          $role = Auth::user()->role; //Variavel role() usada para controlar os acessos para(admin, director, department_head(chefe de departamento) ou employee(funcionario))
        @endphp

        <div id="layoutSidenav_nav">
          <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
              <div class="nav">

                <!-- Dashboard -->
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Menus</div>
                <!-- home do sistema -->
                <a class="nav-link " href="{{ route('frontend.index') }}" target="_blank" rel="noopener noreferrer">
                  <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                  SITE
                </a>
                <!-- ===================== ADMIN ===================== -->
                @if($role === 'admin')
                  {{-- Exibe tudo --}}
                  
                  
                  

                  


                  <!-- Departamentos -->
                  {{-- Link para o módulo de Avaliações de Estagiários (para administradores, diretores e chefes de departamento) --}}
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDept"
                     aria-expanded="false" aria-controls="collapseDept">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    TRAILLERS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  
                  <div class="collapse" id="collapseDept" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('depart') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('depart/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>

                  <!-- Cargos -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePositions"
                     aria-expanded="false" aria-controls="collapsePositions">
                    <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                   FILMES 
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePositions" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('positions') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('positions/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>

                  

                <!-- ===================== DIRECTOR ===================== -->
                @elseif($role === 'director')
                  {{-- Diretor vê tudo, exceto Tipos de Licença, Tipos de Funcionários e Usuários --}}
                  <!-- Departamentos -->
                    <!-- Avaliação dos Estagiários -->
                    @php
                    $userRole = Auth::check() ? Auth::user()->role : 'guest';
                    @endphp

                    @if(in_array($userRole, ['admin', 'director', 'department_head']))
                    <a class="nav-link" href="{{ route('internEvaluation.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
                        Avaliações de Estagiários
                    </a>
                    @endif

                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDept"
                     aria-expanded="false" aria-controls="collapseDept">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Departamentos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseDept" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('depart') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('depart/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Cargos -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePositions"
                     aria-expanded="false" aria-controls="collapsePositions">
                    <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                    Cargos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePositions" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('positions') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('positions/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Especialidades -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSpecialties"
                     aria-expanded="false" aria-controls="collapseSpecialties">
                    <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                    Especialidades
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseSpecialties" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('specialties') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('specialties/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Pedidos de Licença -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLeaveRequest"
                     aria-expanded="false" aria-controls="collapseLeaveRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Pedidos de Licença
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLeaveRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('leaveRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('leaveRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Mobilidade -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMobility"
                     aria-expanded="false" aria-controls="collapseMobility">
                    <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                    Mobilidade
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseMobility" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('mobility') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('mobility/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Destacamento -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSecondment"
                     aria-expanded="false" aria-controls="collapseSecondment">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users-rays"></i></div>
                    Destacamento
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseSecondment" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('secondment') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('secondment/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Pedido de Férias -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVacationRequest"
                     aria-expanded="false" aria-controls="collapseVacationRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-umbrella-beach"></i></div>
                    Pedido de Férias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseVacationRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('vacationRequest.departmentSummary') }}">Férias por Departamento</a>
                      <a class="nav-link" href="{{ url('vacationRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('vacationRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Funcionários -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmp"
                     aria-expanded="false" aria-controls="collapseEmp">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Funcionários
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseEmp" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('employeee') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('employeee/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                 
                  <!-- Portal do Chefe (Diretor também enxerga se quiser) -->
                  <!-- Portal do Chefe -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deptHeadMenu"
                  aria-expanded="false" aria-controls="deptHeadMenu">
                  <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                  Portal do Chefe Dept.
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="deptHeadMenu" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="{{ route('dh.myEmployees') }}">Meus Funcionários</a>
                  <a class="nav-link" href="{{ route('dh.pendingVacations') }}">Férias Pendentes</a>
                  <a class="nav-link" href="{{ route('dh.pendingLeaves') }}">Licenças Pendentes</a>
                  <a class="nav-link" href="{{ route('dh.pendingRetirements') }}">Pedidos de Reforma</a>
                  </nav>
                  </div>

                <!-- ===================== CHEFE DEPARTAMENTO ===================== -->
                @elseif($role === 'department_head')
                  <!-- Pedidos de Licença -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLeaveRequest"
                     aria-expanded="false" aria-controls="collapseLeaveRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Pedidos de Licença
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLeaveRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('leaveRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('leaveRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Pedido de Férias -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVacationRequest"
                     aria-expanded="false" aria-controls="collapseVacationRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-umbrella-beach"></i></div>
                    Pedido de Férias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseVacationRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('vacationRequest.departmentSummary') }}">Férias por Departamento</a>
                      <a class="nav-link" href="{{ url('vacationRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('vacationRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>

                  <!-- Avaliações de Funcionários -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmpEval"
                    aria-expanded="false" aria-controls="collapseEmpEval">
                    <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                    Avaliações Funcionários
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseEmpEval" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('employeeEvaluations.index') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ route('employeeEvaluations.create') }}">Adicionar Novo</a>
                    </nav>
                  </div>


                  <!-- Avaliação dos Estagiários -->
                    @php
                          $userRole = Auth::check() ? Auth::user()->role : 'guest';
                      @endphp

                      @if(in_array($userRole, ['admin', 'director', 'department_head']))
                          <!-- Avaliações de Estagiários -->
                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInternEvaluation"
                            aria-expanded="false" aria-controls="collapseInternEvaluation">
                              <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
                              Avaliações de Estagiários
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="collapseInternEvaluation" data-bs-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="{{ route('internEvaluation.index') }}">Ver Todos</a>
                                  <a class="nav-link" href="{{ route('internEvaluation.create') }}">Adicionar Novo</a>
                              </nav>
                          </div>
                      @endif

                     


                  <!-- Portal do Chefe -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#deptHeadMenu"
                  aria-expanded="false" aria-controls="deptHeadMenu">
                  <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                  Portal do Chefe Dept.
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="deptHeadMenu" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="{{ route('dh.myEmployees') }}">Meus Funcionários</a>
                  <a class="nav-link" href="{{ route('dh.pendingVacations') }}">Férias Pendentes</a>
                  <a class="nav-link" href="{{ route('dh.pendingLeaves') }}">Licenças Pendentes</a>
                  <a class="nav-link" href="{{ route('dh.pendingRetirements') }}">Pedidos de Reforma</a>
                  </nav>   
                  </div>

                  <!-- Mapa de Efetividade -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAttendance"
                  aria-expanded="false" aria-controls="collapseAttendance">
                  <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                  Mapa de Efetividade
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseAttendance" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link" href="{{ route('attendance.index') }}">Ver Registros</a>
                  <a class="nav-link" href="{{ route('attendance.create') }}">Registrar Presença</a>
                  <a class="nav-link" href="{{ route('attendance.dashboard') }}">Dashboard de Efetividade</a>
                  </nav>
                  </div>




                  @can('manage-inventory')
                  @php
                      $admin = Auth::user();
                      $emp   = $admin->employee;
                      $dept  = $emp->department->title ?? '';
              
                      switch ($dept) {
                          case 'Departamento de Gestão de Infra-Estrutura Tecnológica e Serviços Partilhados':
                              $slug = 'infraestrutura';
                              break;
              
                          case 'Departamento de Administração e Serviços Gerais':
                              $slug = 'servicos_gerais';
                              break;
              
                          default:
                              $slug = null;
                      }
                  @endphp
              
                  @if($slug)
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMaterials"
                         aria-expanded="false" aria-controls="collapseMaterials">
                        <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                        Materiais / Estoque
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="collapseMaterials" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="{{ route('material-types.index') }}">
                            <i class="fas fa-tags"></i> Tipos de Material
                          </a>
                          <a class="nav-link" href="{{ route('materials.create', ['category' => $slug]) }}">
                            Novo Material
                          </a>
                          <a class="nav-link" href="{{ route('materials.index', ['category' => $slug]) }}">
                            Ver Estoque
                          </a>
                          <a class="nav-link" href="{{ route('materials.transactions.in', ['category' => $slug]) }}">
                            Entrada
                          </a>
                          <a class="nav-link" href="{{ route('materials.transactions.out', ['category' => $slug]) }}">
                            Saída
                          </a>
                          <a class="nav-link" href="{{ route('materials.transactions.index', ['category' => $slug]) }}">
                            Histórico
                          </a>
                        </nav>
                      </div>
                  @endif
              @endcan
              


                <!-- ===================== FUNCIONÁRIO NORMAL ===================== -->
                @elseif($role === 'employee')
                  <!-- Pedidos de Licença -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLeaveRequest"
                    aria-expanded="false" aria-controls="collapseLeaveRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Pedidos de Licença
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLeaveRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('leaveRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('leaveRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Pedido de Férias -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVacationRequest"
                    aria-expanded="false" aria-controls="collapseVacationRequest">
                    <div class="sb-nav-link-icon"><i class="fas fa-umbrella-beach"></i></div>
                    Pedido de Férias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseVacationRequest" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('vacationRequest') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('vacationRequest/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                  <!-- Pedido de Reforma -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRetirements"
                    aria-expanded="false" aria-controls="collapseRetirements">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                    Reforma
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseRetirements" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ url('retirements') }}">Ver Todos</a>
                      <a class="nav-link" href="{{ url('retirements/create') }}">Adicionar Novo</a>
                    </nav>
                  </div>
                @endif

                <!-- Link Meu Perfil: sempre aparece para qualquer usuário logado -->

                <a class="nav-link" href="{{ route('profile') }}">
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  Meu Perfil
                </a>

                <!-- Fazer depois a cena do historico de cada funcionario 
                  
                  <a class="nav-link" href=" colocar dupla chaves aqui route('employee.history') colocar dupla chaves aqui">
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                  Meu historico
                </a>  -->

               

                

              </div>
            </div>
          </nav>
        </div>
      @else
        <!-- Se não estiver logado, redirecione para login -->
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100%;">
          <h4>Você não está logado.</h4>
        </div>
      @endif

      <!-- Conteúdo Principal a onde os menus vão usar o extend das minhas yields-->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            @yield('content')
          </div>
        </main>

          <!-- O meu footer -->
          @include('layouts.admin.footer')
      </div>
    </div>

    <!-- Modal de Sucesso -->
    @if(session('msg'))
      <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title" id="successModalLabel">
                <i class="bi bi-check-circle-fill me-2"></i>Sucesso
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              {{ session('msg') }}
            </div>
          </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var successModalEl = document.getElementById('successModal');
          var successModal = new bootstrap.Modal(successModalEl);
          successModal.show();
        });
      </script>
    @endif

    <!-- Modal de Erro -->
    @if($errors->any())
      <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title" id="errorModalLabel">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>Erro(s) de Validação
              </h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          var errorModalEl = document.getElementById('errorModal');
          var errorModal = new bootstrap.Modal(errorModalEl);
          errorModal.show();
        });
      </script>
    @endif

    <!-- Modal de Confirmação de Deleção -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteModalLabel">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>Confirmar Exclusão
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja deletar este registro?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Deletar</a>
          </div>
        </div>
      </div>
    </div>

    
    

    <!-- Scripts do Bootstrap e demais bibliotecas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield('scripts')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7/inputmask.min.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function(){
          var currencyInputs = document.querySelectorAll('.currency');
          currencyInputs.forEach(function(input){
            Inputmask({
              alias: 'numeric',
              groupSeparator: '.',
              autoGroup: true,
              digits: 2,
              digitsOptional: false,
              removeMaskOnSubmit: false, 
              placeholder: ''
            }).mask(input);
          });
        });
      </script> --}}
      @stack('scripts')
  </body>
</html>
