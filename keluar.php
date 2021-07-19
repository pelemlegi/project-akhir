<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Project Akhir</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Laboratorium Teknik Informatika</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <a href="https://github.com/pelemlegi/project-akhir" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Persediaan Peralatan
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
					<li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="masuk.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Peralatan Masuk
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
					<li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                        <a href="keluar.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Peralatan Keluar
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li> 
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Card Sextion Starts Here -->
                    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

                        <!-- card -->

                        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                            <div class="px-6 py-2 border-b border-light-grey">
                                <div class="font-bold text-xl">Peralatan Keluar</div>
								<div class="p-3">
                                <button data-modal='centeredFormModal'
                                    class="modal-trigger bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Tambahkan Barang
                                </button>
                            </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-grey-darkest">
                                    <thead class="bg-grey-dark text-white text-normal">
                                    <tr>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Alat</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Penerima</th>
                                    </tr>
                                    </thead>
                                    <tbody>
										<?php
											$ambilsemuadatastock = mysqli_query($conn,"select * from keluar k, stock s where s.idbarang = k.idbarang");
											while($data = mysqli_fetch_array($ambilsemuadatastock))
											{
												$tanggal = $data['tanggal'];
												$namabarang = $data['namabarang'];
												$qty = $data['qty'];
												$penerima = $data['penerima'];
										?>									
										<tr>
											<td>
                                                <?php
                                                    echo date('d ', strtotime($tanggal));
                                                    $month = date('F', strtotime($tanggal));
                                                    switch ($month) {
                                                        case 'January':
                                                            echo "Januari";
                                                            break;
                                                        case 'February':
                                                            echo "Februari";
                                                            break;
                                                        case 'March':
                                                            echo "Maret";
                                                            break;
                                                        case 'April':
                                                            echo "April";
                                                            break;
                                                        case 'May':
                                                            echo "Mei";
                                                            break;
                                                        case 'June':
                                                            echo "Juni";
                                                            break;
                                                        case 'July':
                                                            echo "Juli";
                                                            break;
                                                        case 'August':
                                                            echo "Agustus";
                                                            break;
                                                        case 'September':
                                                            echo "September";
                                                            break;
                                                        case 'Oktober':
                                                            echo "Oktober";
                                                            break;
                                                        case 'November':
                                                            echo "November";
                                                            break;
                                                        default:
                                                            echo "Desember";
                                                    }
                                                    echo date(' Y', strtotime($tanggal));
                                                    echo ", Pukul ";
                                                    echo date('H.i', strtotime($tanggal));
                                                    echo " WIB";  
                                                ?>
                                            </td>
											<td><?=$namabarang;?></td>
											<td><?=$qty;?></td>
											<td><?=$penerima;?></td>
										</tr>
										<?php
											};									
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /card -->

                    </div>
                    <!-- /Cards Section Ends Here -->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">C-2000018166-Muhammad Izza</div>
        </footer>
        <!--/footer-->

    </div>

</div>

<!-- Centered With a Form Modal -->
<div id='centeredFormModal' class="modal-wrapper">
    <div class="overlay close-modal"></div>
    <div class="modal modal-centered">
        <div class="modal-content shadow-lg p-5">
            <div class="border-b p-2 pb-3 pt-0 mb-4">
               <div class="flex justify-between items-center">
                    Tambahkan Alat
                    <span class='close-modal cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200'>
                        <i class="fas fa-times text-gray-700"></i>
                    </span>
               </div>
            </div>
            <!-- Modal content -->
            <form method = "post" id='form_id' class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
					<div class="w-full px-3">
					<select name = "barangnya" class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey">
						<?php
							$ambilsemuadatanya = mysqli_query($conn,"select * from stock");
							while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
								$namabarangnya = $fetcharray['namabarang'];
								$idbarangnya = $fetcharray['idbarang'];
						?>
						
						<option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>
						
						<?php
							}
						?>
					</select>
					</div>
					<div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Jumlah
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type = "number" name = "qty" placeholder = "Jumlah" required>
                    </div>
					<div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1" for="grid-password">
                            Penerima
                        </label>
                        <input
                            class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" id="grid-password" type = "text" name = "penerima" placeholder = "Penerima" required>
                    </div>
                </div>                

                <div class="mt-5">
                    <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded' name = "addbarangkeluar"> Serahkan </button>
                    <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>
                        Tutup
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="./main.js"></script>

</body>

</html>