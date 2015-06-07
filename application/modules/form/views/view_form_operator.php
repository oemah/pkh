<style type="text/css" media="screen">
    .span3{
        text-align: right;
    }
</style>
<div class="workplace">
    <div class="row-fluid">
        <div class="span12">                    
            <div class="head clearfix">
                <div class="isw-grid"></div>
                <h1 style="font-size:16px">Form Seleksi Operator</h1>      
            </div>

            <div class="form_input">
            <?=form_open_multipart(base_url().'form/saveData',array('id'=>'form_input'))?>
                <div class="block-fluid">
                    <div class="row-form clearfix">
                        <div class="span6">
                            <div class="row-form clearfix">
                                <div class="span3"><b>Kategori Pendaftaran</b></div>
                                <div class="span7">
                                    <select name="ds[category_id]" id="category_id">
                                        <option value="operator">Operator</option>
                                        <option value="pendamping">Pendamping</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>NIK</b></div>
                                <div class="span5"><input name="ds[nik]" id="nik" placeholder="NIK" type="text"/></div>
                                <div class="span4" style="padding-top:2px">
                                    <input class="btn btn-small btn-info check" type="button" value="Check"><span class='avail' style='color:green; margin-left:6px'></span>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>KABUPATEN/KOTA</b></div>
                                <div class="span7">
                                    <select name="ds[kategori_kabupaten]" id="kategori_kabupaten">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>NAMA LENGKAP DAN GELAR</b></div>
                                <div class="span7"><input name="ds[nama]" id="nama" placeholder="NAMA LENGKAP DAN GELAR" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>ALAMAT SESUAI KTP</b></div>
                                <div class="span7"><input name="ds[alamat]" id="alamat" placeholder="ALAMAT SESUAI KTP" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">RT</div>
                                <div class="span7"><input name="ds[rt]" id="rt" placeholder="RT" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">RW</div>
                                <div class="span7"><input name="ds[rw]" id="rw" placeholder="RW" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KELURAHAN/DESA</div>
                                <div class="span7"><input name="ds[kelurahan]" id="kelurahan" placeholder="KELURAHAN/DESA" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KECAMATAN</div>
                                <div class="span7"><input name="ds[kecamatan]" id="kecamatan" placeholder="KECAMATAN" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KABUPATEN/KOTA </div>
                                <div class="span7"><input name="ds[kabupaten]" id="kabupaten" placeholder="KABUPATEN/KOTA" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PROVINSI</div>
                                <div class="span7">
                                     <select name="ds[provinsi]" id="provinsi">
                                        <option value="D.I.Yogyakarta">D.I.Yogyakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>ALAMAT DOMISILI</b></div>
                                <div class="span7"><input name="ds[alamat_domisili]" id="alamat_domisili" placeholder="ALAMAT DOMISILI" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">RT</div>
                                <div class="span7"><input name="ds[rt_domisili]" id="rt_domisili" placeholder="RT" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">RW</div>
                                <div class="span7"><input name="ds[rw_domisili]" id="rw_domisili" placeholder="RW" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KELURAHAN/DESA</div>
                                <div class="span7"><input name="ds[kelurahan_domisili]" id="kelurahan_domisili" placeholder="KELURAHAN/DESA" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KECAMATAN</div>
                                <div class="span7"><input name="ds[kecamatan_domisili]" id="kecamatan_domisili" placeholder="KECAMATAN" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">KABUPATEN/KOTA </div>
                                <div class="span7">
                                    <select name="ds[kabupaten_domisili]" id="kabupaten_domisili">
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">PROVINSI</div>
                                <div class="span7">
                                    <select name="ds[provinsi_domisili]" id="provinsi_domisili">
                                        <option value="D.I.Yogyakarta">D.I.Yogyakarta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="row-form clearfix">
                                <div class="span12" style="text-align:right; font-size:14px; font-weight:bold">Registration closes in <span id="time">05:00</span> minutes!</div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>NO TELP/HP (aktif)</b></div>
                                <div class="span7"><input name="ds[telp]" id="telp" placeholder="NO TELP/HP (aktif)" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>ALAMAT E-MAIL</b></div>
                                <div class="span7"><input name="ds[email]" id="email" placeholder="ALAMAT E-MAIL" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>TEMPAT LAHIR</b></div>
                                <div class="span7"><input name="ds[tempat_lahir]" id="tempat_lahir" placeholder="TEMPAT LAHIR" type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>TANGGAL LAHIR</b></div>
                                <div class="span7"><input class="datepicker" name="ds[tanggal_lahir]" id="start" placeholder='TANGGAL LAHIR' type="text"/></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12" style="text-align:center"><b><u>PENDIDIKAN</u></b></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>JENJANG</b></div>
                                <div class="span7">
                                    <select name="ds[jenjang_pendidikan]" id="jenjang_pendidikan">
                                        <option value="">Pilih</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1">S1</option>
                                        <option value="S2/S3">S2/S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>JURUSAN</b></div>
                                <div class="span7">
                                    <select name="ds[jurusan_pendidikan]" id="jurusan_pendidikan">
                                        <option value="">Pilih</option>
                                        <option value="Teknik">Teknik : TI/SI/MI/ILKom/Jaringan/Statistik</option>
                                        <option value="NonTeknik">Ilmu Sosial : Hukum/Pendidikan/Kesehatan/Agama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12" style="text-align:center">
                                    <b><u>PENGALAMAN KERJA</u></b><br>
                                    <b>PENGALAMAN DALAM PENANGANAN DAN PELAYANAN BIDANG KESEJAHTERAAN SOSIAL</b>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>LAMANYA</b></div>
                                <div class="span7">
                                    <select name="ds[lama_kerja]" id="lama_kerja">
                                        <option value="0">Tidak Pernah</option>
                                        <option value="1">0-1 Tahun</option>
                                        <option value="2">2-3 Tahun</option>
                                        <option value="3">>3 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12" style="text-align:center"><b><u>KEAHLIAN LAIN</u></b></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>KEAHLIAN LAIN</b></div>
                                <div class="span7"><textarea name="ds[keahlian]" id="item_desc"></textarea></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span12" style="text-align:center"><b><u>KONTRAK DENGAN PIHAK LAIN</u></b></div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>KONTRAK</b></div>
                                <div class="span7">
                                    <select name="ds[kontrak]" id="kontrak">
                                        <option value="">Pilih</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3"><b>UPLOAD FILE</b></div>
                                <div class="span7"><input type="file" name="file" id="file"></div>
                            </div>
                            <input type="hidden" class="duration" name="ds[duration]">
                        </div>
                    </div>
                </div>
                <div class="block-fluid">                        
                    <div class="row-form sub clearfix">
                        <div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close()?>
            </div>

        </div>                                
    </div>  
    <div class="dr"><span></span></div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
    $(function(){
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var five = 60 * 15;
            setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);
                $('.duration').val(five-timer);

                if (--timer < 0) {
                    timer = duration;
                    $('#form_input').submit();
                    window.location.href = base_url+'form/'+operator;
                }
            }, 1000);
        }

        jQuery(function ($) {
            var fiveMinutes = 60 * 15,
                display = $('#time');
            startTimer(fiveMinutes, display);
        });

        $('#category_id').change(function(){
            var id = $(this).val();
            window.location.href = base_url+'form/'+id;
        })
        $('.check').click(function(){
            var nik = $('#nik').val();
            $.ajax({
                cache: false,
                url: base_url+"form/checkavailable/"+nik,
                type: "GET",
                success: function (data) {
                    $('.avail').html('<i>'+data+'</i>');
                    return false;
                }
            })
        })
    })
</script>