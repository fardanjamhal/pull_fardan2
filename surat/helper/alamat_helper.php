        <?php
$alamat = [];

// Gabung bagian hanya jika datanya tidak kosong
										if (!empty($data['jalan'])) $alamat[] = $data['jalan'];
										if (!empty($data['rt']) || !empty($data['rw'])) {
											$rt = !empty($data['rt']) ? $data['rt'] : '-';
											$rw = !empty($data['rw']) ? $data['rw'] : '-';
											$alamat[] = "RT$rt/RW$rw";
										}
										if (!empty($data['dusun'])) $alamat[] = "Dusun " . $data['dusun'];
										if (!empty($data['desa'])) $alamat[] = "Desa " . $data['desa'];
										if (!empty($data['kecamatan'])) $alamat[] = "Kecamatan " . $data['kecamatan'];
										if (!empty($data['kota'])) $alamat[] = $data['kota'];

										// Gabungkan semua bagian dengan spasi
										$alamatLengkap = implode(" ", $alamat);
										?>

										<textarea name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?= htmlspecialchars($alamatLengkap); ?></textarea>


