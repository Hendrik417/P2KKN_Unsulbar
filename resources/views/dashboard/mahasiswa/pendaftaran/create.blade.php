<form action="" method="POST" enctype="multipart/form-data" class="p-8 lg:p-10 space-y-8">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Nama
                                            Mahasiswa</label>
                                        <input type="text" name="nama"
                                            value=""
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">NIM</label>
                                        <input type="text" name="nim" value=""
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Jenis
                                            Kelamin</label>
                                        <select name="jk"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Nomor
                                            Handphone</label>
                                        <input type="text" name="no_hp" placeholder="08..."
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm">
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Fakultas</label>
                                        <select name="fakultas"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Fakultas</option>
                                            <option value="Teknik">Teknik</option>
                                        </select>
                                    </div>
                                    <div class="space-y-1">
                                        <label
                                            class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Prodi</label>
                                        <select name="prodi"
                                            class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                            <option value="">Pilih Program Studi</option>
                                            <option value="Informatika">Informatika</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label
                                        class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Jenis
                                        KKN</label>
                                    <select name="jenis_kkn"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-100 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition text-sm appearance-none">
                                        <option value="Reguler">Reguler</option>
                                        <option value="MBKM">MBKM</option>
                                    </select>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-4">
                                    <div
                                        class="space-y-2 text-center border-2 border-dashed border-gray-100 rounded-3xl p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                                        <input type="file" name="surat_pernyataan" class="hidden" id="f1"
                                            onchange="up(this, 's1')">
                                        <label for="f1" class="cursor-pointer block">
                                            <i
                                                class="ph ph-file-pdf text-4xl text-gray-300 group-hover:text-red-500 transition-colors"></i>
                                            <p id="s1"
                                                class="text-[10px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                                Surat Pernyataan (PDF)</p>
                                        </label>
                                    </div>
                                    <div
                                        class="space-y-2 text-center border-2 border-dashed border-gray-100 rounded-3xl p-6 hover:bg-gray-50 transition-colors cursor-pointer group">
                                        <input type="file" name="khs" class="hidden" id="f2"
                                            onchange="up(this, 's2')">
                                        <label for="f2" class="cursor-pointer block">
                                            <i
                                                class="ph ph-article text-4xl text-gray-300 group-hover:text-indigo-500 transition-colors"></i>
                                            <p id="s2"
                                                class="text-[10px] font-bold text-gray-400 mt-2 uppercase tracking-tighter">
                                                KHS Terakhir (PDF)</p>
                                        </label>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end gap-3 pt-6 border-t border-gray-50">
                                    <button type="button"
                                        class="px-6 py-2.5 text-xs font-bold text-gray-400 uppercase tracking-widest hover:text-gray-600 transition-colors">Cancel</button>
                                    <button type="submit"
                                        class="px-8 py-2.5 bg-red-600 text-white rounded-lg text-xs font-bold uppercase tracking-widest hover:bg-red-700 shadow-lg shadow-red-200 transition-all">Submit
                                        Data</button>
                                </div>
                            </form>