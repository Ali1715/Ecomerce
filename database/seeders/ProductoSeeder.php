<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        producto::create([
            'name' => 'HP Laptop De 15.6 pulgadas',
            'descripcion' => 'HP Laptop de 15.6 pulgadas, Intel Core i5-1135G7 de 11ª generación, gráficos Intel Iris Xe, 8 GB de RAM,
                                    SSD de 256 GB, Windows 11 Home (15-dy2024nr, plata natural)',
            'stock' => '27',
            'precioUnitario' => '4682.36',
            'imagen' => 'Laptop_HP_De_15_6_Pulgadas.PNG',
            'idcategoria' => '5',
            'idmarca' => '12',
            'idpromocion' => '5'
        ]);
        producto::create([
            'name' => 'Laptop Lenovo Ideapad 3 2022',
            'descripcion' => 'Laptop Lenovo Ideapad 3 2022, pantalla táctil HD de 15.6 pulgadas, procesador Intel Core i3-1115G4 
                                    de 11ª generación, memoria RAM DDR4 de 8 GB, SSD PCIe NVMe de 256 GB, HDMI, cámara web, Wi-Fi 5, Bluetooth,
                                    Windows 11 Home, almendra',
            'stock' => '16',
            'precioUnitario' => '6803.71',
            'imagen' => 'Laptop_Lenovo_Ideapad_3.PNG',
            'idcategoria' => '5',
            'idmarca' => '13'
        ]);
        producto::create([
            'name' => 'HP V8 RGB RAM 16GB Kit (8GBx2) ',
            'descripcion' => 'HP V8 RGB RAM 16GB Kit (8GBx2) DDR4 3600MHz CL18 1.35V Computadora de escritorio Gmaing Memoria LED - 
                                    8MG06AA#ABC',
            'stock' => '23',
            'precioUnitario' => '553.31',
            'imagen' => 'Memoria_Ram_8x2_HP.PNG',
            'idcategoria' => '3',
            'idmarca' => '12',
            'idpromocion' => '1'
        ]);
        producto::create([
            'name' => 'Corsair Vengeance RGB Pro de 32 GB (2 x 16 GB)',
            'descripcion' => 'Corsair Vengeance RGB Pro de 32 GB (2 x 16 GB) DDR4 3600 (PC4-28800) C18 AMD - Memoria optimizada - Negro',
            'stock' => '40',
            'precioUnitario' => '1012',
            'imagen' => 'Memoria_Ram_16x2_Corsair_Vengeance_Pro.PNG',
            'idcategoria' => '3',
            'idmarca' => '6'
        ]);
        producto::create([
            'name' => 'ASUS Prime H410M-A',
            'descripcion' => 'ASUS Prime H410M-A/CSM LGA1200 (Intel® 10ª generación) Micro-ATX Commercial Motherboard 
                                    (M.2 Support, HDMI, D-Sub, DVI, USB 3.2 Gen 1, CO Header, TPM Header y ASUS Control Center Express)',
            'stock' => '45',
            'precioUnitario' => '602',
            'imagen' => 'Tarjeta_Madre_Asus_Prime_H410M-A.PNG',
            'idcategoria' => '2',
            'idmarca' => '5',
            'idpromocion' => '4'
        ]);
        producto::create([
            'name' => 'MSI B550-A PRO ProSeries',
            'descripcion' => 'MSI B550-A PRO ProSeries - Placa base (AMD AM4, DDR4, PCIe 4.0, SATA 6Gb/s, M.2, USB 3.2 Gen 2, 
                                    HDMI/DP, ATX)',
            'stock' => '42',
            'precioUnitario' => '993',
            'imagen' => 'Tarjeta_Madre_MSI_B550-A_Pro.PNG',
            'idcategoria' => '2',
            'idmarca' => '19'
        ]);
        producto::create([
            'name' => 'Ryzen 7 5800X',
            'descripcion' => 'AMD Procesador de escritorio desbloqueado Ryzen 7 5800X de 8 núcleos y 16 hilos',
            'stock' => '50',
            'precioUnitario' => '3125.04',
            'imagen' => 'Procesador_AMD_Ryzen_7_5800X.PNG',
            'idcategoria' => '4',
            'idmarca' => '2',
            'idpromocion' => '2'
        ]);
        producto::create([
            'name' => 'Intel Core i5-12600K',
            'descripcion' => 'Intel Core i5-12600K Procesador de Escritorio 10 (6P+4E) Núcleos de hasta 4.9 GHz Desbloqueado 
                                    LGA1700 600 Series Chipset 125W',
            'stock' => '17',
            'precioUnitario' => '1927.92',
            'imagen' => 'Procesador_Intel_Core_i5_12600K.PNG',
            'idcategoria' => '4',
            'idmarca' => '15'
        ]);
        producto::create([
            'name' => 'Crucial BX500 1TB',
            'descripcion' => 'Crucial BX500 1TB 3D NAND SATA 2.5-Inch Internal SSD, up to 540MB/s - CT1000BX500SSD1',
            'stock' => '62',
            'precioUnitario' => '626.4',
            'imagen' => 'SSD_Crucial_BX500_1TB.PNG',
            'idcategoria' => '1',
            'idmarca' => '25',
            'idpromocion' => '3'
        ]);
        producto::create([
            'name' => 'Seagate Barracuda Pro SATA HDD 10TB',
            'descripcion' => 'Seagate Barracuda Pro SATA HDD 10TB 7200RPM 6Gb/s 256MB de caché 3.5 pulgadas disco duro 
                                    interno para PC Desktop Computers System All in One Home Servers DAS (ST10000DM0004) (renovado)',
            'stock' => '53',
            'precioUnitario' => '1250.364',
            'imagen' => 'HDD_Seagate_Barracuda_10TB.PNG',
            'idcategoria' => '1',
            'idmarca' => '21'
        ]);
    }
}
