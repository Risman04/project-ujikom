<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(0, 128, 255)">
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('assets/img/profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
            </div>

         <!-- SidebarSearch Form -->
            
         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if(Auth::user()->level == 1)
                <li class="nav-item">
                    <a href="home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                    <span style="display: block; background-color:white; height: 1px; width:95%; margin: auto;"></span>
                    <b style="color: white; margin: 10px 10px 10px 20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Pilih Menu</b>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Data Pengguna
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="fa fa-database"></i>
                    <p style="margin-left: 10px">
                      Data Master
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- Menu Pilihan --}}
                      <li class="nav-item">
                          <a href="{{ route('jenis.index') }}" class="nav-link">
                            <i class="fa fa-clipboard-check"></i>
                              <p style="margin-left: 10px">
                                  Jenis Barang
                                  {{-- <i class="right fas fa-angle-left"></i> --}}
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('satuan.index') }}" class="nav-link">
                          <i class="fa fa-clipboard-check"></i>
                            <p style="margin-left: 10px">
                                Satuan Barang
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('supplier.index') }}" class="nav-link">
                          <i class="fa fa-clipboard-check"></i>
                            <p style="margin-left: 10px">
                                Data Supplier
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                      </li>
                      <li class="nav-item">
                      <a href="{{ route('databarang.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Data Barang
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                  </ul>
                </li>  
                <li class="nav-item menu-open">
                  <a href="#" class="nav-link active">
                    <i class="fa fa-database"></i>
                    <p style="margin-left: 10px">
                      Transaksi
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- Menu Pilihan --}}
                    <li class="nav-item">
                      <a href="{{ route('barangmasuk.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Barang Masuk
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    {{-- Menu Pilihan --}}
                    <li class="nav-item">
                      <a href="{{ route('barangkeluar.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Barang Keluar
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                  </ul>
                </li>
                @elseif(Auth::user()->level == 2)
                <li class="nav-item">
                  <a href="home" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard
                          {{-- <i class="right fas fa-angle-left"></i> --}}
                      </p>
                  </a>
              </li>
                  <span style="display: block; background-color:white; height: 1px; width:95%; margin: auto;"></span>
                  <b style="color: white; margin: 10px 10px 10px 20px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Pilih Menu</b>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="fa fa-database"></i>
                  <p style="margin-left: 10px">
                    Data Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- Menu Pilihan --}}
                    <li class="nav-item">
                        <a href="{{ route('jenis.index') }}" class="nav-link">
                          <i class="fa fa-clipboard-check"></i>
                            <p style="margin-left: 10px">
                                Jenis Barang
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('satuan.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Satuan Barang
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Data Supplier
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('databarang.index') }}" class="nav-link">
                      <i class="fa fa-clipboard-check"></i>
                        <p style="margin-left: 10px">
                            Data Barang
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                  </li>
                </ul>
              </li>  
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="fa fa-database"></i>
                  <p style="margin-left: 10px">
                    Transaksi
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- Menu Pilihan --}}
                  <li class="nav-item">
                    <a href="{{ route('barangmasuk.index') }}" class="nav-link">
                      <i class="fa fa-clipboard-check"></i>
                        <p style="margin-left: 10px">
                            Barang Masuk
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('barangkeluar.index') }}" class="nav-link">
                      <i class="fa fa-clipboard-check"></i>
                        <p style="margin-left: 10px">
                            Barang Keluar
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                  </li>
                </ul>
                <ul class="nav nav-treeview">
                    {{-- Menu Pilihan --}}
                    <li class="nav-item">
                      <a href="{{ route('barangkeluar.index') }}" class="nav-link">
                        <i class="fa fa-clipboard-check"></i>
                          <p style="margin-left: 10px">
                              Barang Keluar
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                    </li>
                  </ul>
              </li>
                @endif
            </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>