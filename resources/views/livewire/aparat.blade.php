<div>
            @if($responsive == 'tablet' || $responsive == 'mobile')
            <header class='aparat'>
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat">
                    <div class='text'>
                        <h1>Butuh Surat</h1>
                        <p>Surat Menyurat Kelurahan Lowokwaru</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                    </form>
                </a>
            </header>
            @else
            <header class='aparat'>
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{asset('img/logo.svg')}}" alt="Logo Butuh Surat">
                    <div class='text'>
                        <h1>Butuh Surat</h1>
                        <p>Surat Menyurat Kelurahan Lowokwaru</p>
                    </div>
                </a>
            </header>
            @endif
            <nav>
                <ul>
                    @if($responsive == 'no responsive')
                    <li><button wire:click="showDashboard"><i class='bx bxs-dashboard'></i>Dashboard</button></li>
                    <li><button wire:click="showBuatSurat"><i class="bi bi-envelope-fill"></i></i>Buat Surat</button></li>
                    <li><button wire:click="showDataWarga"><i class="bi bi-journals"></i></i>Data Warga</button></li>
                    <li><button wire:click="showBukuRegister"><i class="bi bi-file-spreadsheet-fill"></i>Buku Register</button></li>
                    <li><button wire:click="showProfile"><i class="bi bi-person-fill"></i>Pengaturan Akun</button></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn-logout"><i class='bx bx-log-out'></i>Keluar</button>
                        </form>
                    </li>
                    @elseif($responsive == 'tablet')
                    <li><button wire:click="showDashboard"><i class='bx bxs-dashboard'></i><span>Dashboard</span></button></li>
                    <li><button wire:click="showBuatSurat"><i class="bi bi-envelope-fill"></i></i><span>Buat Surat</span></button></li>
                    <li><button wire:click="showDataWarga"><i class="bi bi-journals"></i></i><span>Data Warga</span></button></li>
                    <li><button wire:click="showBukuRegister"><i class="bi bi-file-spreadsheet-fill"></i><span>Buku Register</span></button></li>
                    <li><button wire:click="showProfile"><i class="bi bi-person-fill"></i><span>Pengaturan Akun</span></button></li>
                    @elseif($responsive == 'mobile')
                    <li><button wire:click="showDashboard"><i class='bx bxs-dashboard'></i><span>Dashboard</span></button></li>
                    <li><button wire:click="showBuatSurat"><i class="bi bi-envelope-fill"></i></i><span>Surat</span></button></li>
                    <li><button wire:click="showDataWarga"><i class="bi bi-journals"></i></i><span>Warga</span></button></li>
                    <li><button wire:click="showBukuRegister"><i class="bi bi-file-spreadsheet-fill"></i><span>Buku</span></button></li>
                    <li><button wire:click="showProfile"><i class="bi bi-person-fill"></i><span>Akun</span></button></li>
                    @endif
                </ul>       
            </nav>
            <main>
                @if($buttonDashboard == 1)
                <article class="dashboard">
                    <h2>Hai, {{$user->name}}</h2>
                    <h3>Konfirmasi Surat</h3>
                    <livewire:confirm-list />
                </article>
                @elseif($buttonBuatSurat == 1)
                <article class="buat-surat">
                    <h3>Buat Surat</h3>
                    <livewire:list-surat />
                </article>
                @elseif($buttonDataWarga == 1)
                <article class="data-warga">
                    @if($user->jabatan == 'RT')
                    <h3>Data Warga RT {{$user->rt}} RW {{$user->rw}}</h3>
                    @elseif($user->jabatan == 'RW')
                    <h3>Data Warga RW {{$user->rw}}</h3>
                    @endif
                    <livewire:input-data-warga>
                    <livewire:data-warga />
                </article>
                @elseif($buttonBukuRegister == 1)
                <article class="buku-register">
                    <h3>Buku Register {{$user->jabatan}} (RT {{$user->rt}} RW {{$user->rw}})</h3>
                    <livewire:buku-register />
                </article>
                @elseif($buttonProfile == 1)
                <article class="profile">
                    <h3>Profile</h3>
                    <livewire:account-setting />
                </article>
                @endif
            </main>
            <script>
                document.addEventListener('livewire:load', function () {
                    function tabletChange(x) {
                        if (x.matches) {
                            Livewire.emit('responsive', 'tablet');
                        }
                    }

                    var xTablet = window.matchMedia("(max-width: 1000px)");
                    tabletChange(xTablet);
                    xTablet.addListener(tabletChange);

                    function mobileChange(x) {
                        if (x.matches) {
                            Livewire.emit('responsive', 'mobile');
                        }
                    }

                    var xMobile = window.matchMedia("(max-width: 425px)");
                    mobileChange(xMobile);
                    xMobile.addListener(mobileChange);

                    function desktopChange(x) {
                        if (x.matches) {
                            Livewire.emit('responsive', 'desktop');
                        }
                    }

                    var xDesktop= window.matchMedia("(min-width: 1001px)");
                    desktopChange(xDesktop);
                    xDesktop.addListener(desktopChange);
                })
               
            </script>
</div>
