<?php
			// Gunakan variabel yang benar
			$nama_desa_asli = strtolower($rows['nama_desa']);

			if (str_contains($nama_desa_asli, 'kelurahan')) {
				$nama_desa = str_ireplace('kelurahan ', '', $nama_desa_asli);
				$tampilkan = 'Lurah ' . ucwords($nama_desa);
			} else {
				$nama_desa = str_ireplace('desa ', '', $nama_desa_asli);
				$tampilkan = 'Kepala Desa ' . ucwords($nama_desa); // Gunakan teks langsung, bukan dari $rowss
			}
		?>
<td align="center"><?php echo $tampilkan; ?></td>
