    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('home')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Inicio</span></a>
        </li>

        @if( Auth::user()->isAdmin() )

        <li class=" nav-item"><a href="{{url('estadisticas')}}"><i class="ft ft-pie-chart"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Informes</span></a>
        </li>

       {{--   <li class=" nav-item"><a href="{{url('sufragantes')}}"><i class="ft ft-users"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Sufragantes</span></a>
        </li> --}}
        
        <li class=" nav-item"><a href="#"><i class="ft ft-users"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Sufragantes</span></a>
          <ul class="menu-content">
            <li><a class="menu-item"  href="{{url('sufragantes/create')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Crear Sufragantes</a>
            </li>
              <li><a class="menu-item"  href="{{url('sufragantes')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Listado de Sufragantes</a>
            </li>
            <li><a class="menu-item"  href="{{url('usuario/import-excel-view')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Impotar Usuarios</a>
            </li>
            <li><a class="menu-item"  href="{{url('grupos')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Grupos</a>
            </li>
            
          </ul>
        </li>
         <li class=" nav-item"><a href="#"><i class="ft ft-users"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Usuarios</span></a>
          <ul class="menu-content">
            <li><a class="menu-item"  href="{{url('usuarios/create')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Crear Usuarios</a>
            </li>
             <li><a class="menu-item"  href="{{url('usuarios')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Listado de Usuarios</a>
            </li>
          
            
          </ul>
        </li>

        @endif
        @if( Auth::user()->isAdmin() || Auth::user()->isUser())
        <li class=" navigation-header">
          <span data-i18n="nav.category.forms">URNA ELECTRONICA</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
          data-placement="right" data-original-title="Forms"></i>
        </li>
        @if( Auth::user()->isAdmin() )
        <li class=" nav-item"><a href="#"><i class="ft ft-box"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Elecciones</span></a>
          <ul class="menu-content">
            <li><a class="menu-item"  href="{{url('urna/elecciones')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Elecciones</a>
            </li>
            
          </ul>
        </li>
        <li class=" nav-item"><a href="{{url('eleccion/usuarios')}}"><i class="ft ft-users"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Usuarios Asignados</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft ft-user-check"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Candidatos</span></a>
          <ul class="menu-content">
            <li><a class="menu-item"  href="{{url('urna/candidatos')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Candidatos</a>
            </li>

          </ul>
          <ul class="menu-content">
            <li><a class="menu-item"  href="{{url('urna/aspirantes')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Aspirantes</a>
            </li>

          </ul>
        </li>

        @endif

        

        <li class=" nav-item"><a href="#"><i class="ft ft-file"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Tarjetón Virtual</span></a>
          <ul class="menu-content">
           @if( Auth::user()->isAdmin() )
           <li><a class="menu-item"  href="{{url('elecciones/tarjeton')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Vista Previa Tarjetón</a>
           </li>
           @endif
           <li><a class="menu-item"  href="{{url('elecciones/votacion')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Votar</a>
           </li>

         </ul>
       </li>
       @if( Auth::user()->isAdmin() )
       <li class=" nav-item"><a href="{{url('asignargrupo')}}"><i class="ft ft-pie-chart"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">Asignar Usuarios</span></a>
       </li>
       @endif


       @if( Auth::user()->isAdmin() )
       <li class=" navigation-header">
        <span data-i18n="nav.category.forms">CONFIGURACIÓN</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
        data-placement="right" data-original-title="Forms"></i>
      </li>

      <li class=" nav-item"><a href="#"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.form_layouts.main">Configuraciones</span></a>
        <ul class="menu-content">

          <li><a class="menu-item"  href="{{url('configuraciones/notificaciones')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Email/SMS</a>
          </li>
          <li><a class="menu-item"  href="{{url('configuraciones/entidad')}}" data-i18n="nav.form_layouts.form_layout_horizontal">Entidades</a>
          </li>                                        
        </ul>
      </li>
      @endif
      @endif
      <li class=" nav-item">
        <a href="{{url('/logout')}}"><i class="ft ft-power"></i>
          <span class="menu-title" data-i18n="nav.support_documentation.main">Cerrar sesión</span>    
        </a>
      </li>
    </ul>
  </div>