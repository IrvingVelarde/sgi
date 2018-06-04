<div class="panel panel-primary">
  <div class="panel-heading">Menú</div>
  <div class="panel-body">
    <ul class="nav nav-pills nav-stacked">
      @if (auth()->check())
        <li><a href="/home">Dashboard</a></li>
        <li><a href="/ver">Ver Incidencia</a></li>
        <li><a href="/reportar">Reportar Incidencia</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Administración <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="/usuarios">Usuarios</a></li>
                <li><a href="/proyectos">Proyectos</a></li>
                <li><a href="/configuracion">Configuración</a></li>
            </ul>
        </li>
      @else
        <li><a href="/">Bienvenido</a></li>
        <li><a href="/instrucciones">Instruciones</a></li>
        <li><a href="/acerca-de">Creditos</a></li>
      @endif
    </ul>
  </div>
</div>