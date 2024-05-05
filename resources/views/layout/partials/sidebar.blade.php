<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
            {{--<li class="submenu-open">
                    <h6 class="submenu-hdr">Qualificação</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('index', '/', 'sales-dashboard') ? 'active subdrop' : '' }}"><i
                                    data-feather="grid"></i><span>Empresas</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('index') }}"
                                        class="{{ Request::is('index', '/') ? 'active' : '' }}">Gráficos</a></li>
                                <li><a href="{{ url('sales-dashboard') }}"
                                        class="{{ Request::is('sales-dashboard') ? 'active' : '' }}">Relatórios</a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('chat', 'file-manager', 'file-archived', 'file-document', 'file-favourites', 'file-manager-seleted', 'file-recent', 'file-shared', 'notes', 'todo', 'email', 'calendar', 'call-history', 'audio-call', 'video-call', 'file-manager-deleted') ? 'active subdrop' : '' }} "><i
                                    data-feather="smartphone"></i><span>Aplicações</span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('chat') }}"
                                        class="{{ Request::is('chat') ? 'active' : '' }}">Chat</a></li>
                                <li class="submenu submenu-two"><a href="javascript:void(0);"
                                        class="{{ Request::is('video-call', 'audio-call', 'call-history') ? 'active subdrop' : '' }}">Call<span
                                            class="menu-arrow inside-submenu"></span></a>
                                    <ul>
                                        <li><a class="{{ Request::is('video-call') ? 'active' : '' }}"
                                                href="{{ url('video-call') }}">Video Call</a></li>
                                        <li><a class="{{ Request::is('audio-call') ? 'active' : '' }}"
                                                href="{{ url('audio-call') }}">Audio Call</a></li>
                                        <li><a class="{{ Request::is('call-history') ? 'active' : '' }}"
                                                href="{{ url('call-history') }}">Call History</a></li>
                                    </ul>
                                </li>
                                <li><a class="{{ Request::is('calendar') ? 'active' : '' }}"
                                        href="{{ url('calendar') }}">Calendar</a></li>
                                <li><a class="{{ Request::is('email') ? 'active' : '' }}"
                                        href="{{ url('email') }}">Email</a></li>
                                <li><a class="{{ Request::is('todo') ? 'active' : '' }}" href="{{ url('todo') }}">To
                                        Do</a></li>
                                <li><a class="{{ Request::is('notes') ? 'active' : '' }}"
                                        href="{{ url('notes') }}">Notes</a></li>
                                <li><a class="{{ Request::is('file-manager', 'file-archived', 'file-document', 'file-favourites', 'file-manager-seleted', 'file-recent', 'file-shared', 'file-manager-deleted') ? 'active' : '' }}"
                                        href="{{ url('file-manager') }}">File Manager</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Menu principal</h6>
                    <ul>
                        <li class="{{ Request::is('meu-movimento') ? 'active' : '' }}"><a
                                href="{{ route('movimento.index') }}"><i data-feather="box"></i><span>Meu
                                    movimento</span></a>
                        </li>
                        <li class="{{ Request::is('add-product', 'edit-product') ? 'active' : '' }}"><a
                                href="{{ route('guiapag.index') }}"><i data-feather="plus-square"></i><span>Guias
                                    mensais
                                </span></a></li>
                        <li class="submenu">
                            <a href="{{ url('#') }}"
                                class="{{ Request::is('payroll-list', 'payslip') ? 'active subdrop' : '' }}"><i
                                    data-feather="codesandbox"></i><span>Folha Pagamento </span><span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('#') }}"
                                        class="{{ Request::is('payroll-list') ? 'active' : '' }}">Folha mensal</a>
                                </li>
                                <li><a href="{{ route('funcionarios.index') }}"
                                        class="{{ Request::is('payslip') ? 'active' : '' }}">Funcionários</a></li>
                                <li><a href="{{ url('#') }}"
                                        class="{{ Request::is('payslip') ? 'active' : '' }}">Férias</a></li>
                                <li><a href="{{ url('#') }}"
                                        class="{{ Request::is('payslip') ? 'active' : '' }}">Atestados</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('low-stocks') ? 'active' : '' }}"><a
                                href="{{ url('#') }}"><i data-feather="trending-down"></i><span>Nota
                                    Fiscal</span></a></li>
                        <li class="{{ Request::is('category-list') ? 'active' : '' }}"><a
                                href="{{ url('#') }}"><i
                                    data-feather="codepen"></i><span>Balanços</span></a></li>
                        <li class="{{ Request::is('sub-categories') ? 'active' : '' }}"><a
                                href="{{ route('certidao.index') }}"><i data-feather="speaker"></i><span>Certidões
                                </span></a></li>
                        <li class="{{ Request::is('brand-list') ? 'active' : '' }}"><a
                                href="{{ route('docRegulatorio.index') }}"><i data-feather="tag"></i><span>Alvarás e
                                    Licenças</span></a></li>
                        <li class="{{ Request::is('units') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="speaker"></i><span>Contratos</span></a></li>
                        <li class="{{ Request::is('varriant-attributes') ? 'active' : '' }}"><a
                                href="{{ url('#') }}"><i data-feather="layers"></i><span>Documentos
                                    constituição</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Solicitação</h6>
                    <ul>
                        <li class="{{ Request::is('warranty') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="bookmark"></i><span>Alteração contratual</span></a></li>
                        <li class="{{ Request::is('barcode') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="align-justify"></i><span>Certificado digital</span></a></li>
                        <li class="{{ Request::is('qrcode') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="clipboard"></i><span>Imposto de renda</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Processos</h6>
                    <ul>
                        <li class="{{ Request::is('sales-list') ? 'active' : '' }}"><a
                                href="{{ url('#') }}"><i data-feather="copy"></i><span>Em andamento</span></a>
                        </li>
                        <li class="{{ Request::is('invoice-report') ? 'active' : '' }}"><a
                                href="{{ url('#') }}"><i
                                    data-feather="file-text"></i><span>Finalizados</span></a></li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Suporte</h6>
                    <ul>
                        <li class="{{ Request::is('coupons') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="users"></i><span>Chat</span></a>
                        </li>
                        <li class="{{ Request::is('coupons') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="book-open"></i><span>Perguntas frequentes</span></a>
                        </li>
                        <li class="{{ Request::is('coupons') ? 'active' : '' }}"><a href="{{ url('#') }}"><i
                                    data-feather="file"></i><span>Artigos educativos</span></a>
                        </li>
                    </ul>
                </li>
                <li class="submenu-open">
                    <h6 class="submenu-hdr">Configurações</h6>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('general-settings', 'security-settings', 'notification', 'connected-apps') ? 'active subdrop' : '' }}"><i
                                    data-feather="settings"></i><span>Configuração Geral</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ url('#') }}"
                                        class="{{ Request::is('general-settings') ? 'active' : '' }}">Profile</a>
                                </li>
                                <li><a href="{{ url('security-settings') }}"
                                        class="{{ Request::is('#') ? 'active' : '' }}">Security</a>
                                </li>
                                <li><a href="{{ url('notification') }}"
                                        class="{{ Request::is('notification') ? 'active' : '' }}">Notifications</a>
                                </li>
                                <li><a href="{{ url('connected-apps') }}"
                                        class="{{ Request::is('#') ? 'active' : '' }}">Connected
                                        Apps</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Request::is('pusher-settings', 'printer-settings', 'pos-settings', 'custom-fields') ? 'active subdrop' : '' }}"><i
                                    data-feather="smartphone"></i>
                                <span>Aplicativo</span><span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('pusher.index') }}"
                                        class="{{ Request::is('pusher-settings') ? 'active' : '' }}">Pusher</a>
                                </li>
                                <li><a href="{{ url('printer-settings') }}"
                                        class="{{ Request::is('printer-settings') ? 'active' : '' }}">Printer</a>
                                </li>
                                <li><a href="{{ url('pos-settings') }}"
                                        class="{{ Request::is('pos-settings') ? 'active' : '' }}">POS</a></li>
                                <li><a href="{{ url('custom-fields') }}"
                                        class="{{ Request::is('custom-fields') ? 'active' : '' }}">Custom Fields</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
