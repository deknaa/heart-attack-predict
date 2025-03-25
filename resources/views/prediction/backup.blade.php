<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-1 text-4xl font-bold">Prediction Page</h1>

            {{-- heading --}}
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h2 class="text-lg font-bold">
                        {{ $greeting }}, {{ Auth::user()->name }}</h2>
                    <p class="text-slate-400">Quotes Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="flex flex-col">
                    <h3>Today Is <b>{{ $time->dayName }}</b></h3>
                    <div class="flex gap-2">
                        {{-- <p>October 28, 2024</p> --}}
                        <p>{{ $time->day }} {{ $time->monthName }}, {{ $time->year }}</p>
                        <p>{{ $time->hour }}:{{ $time->minute }}:{{ $time->second }}</p>
                    </div>
                </div>
            </div>

            {{-- Quotes --}}
            <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                <svg class="w-8 h-8 mb-4 text-gray-400 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path
                        d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                </svg>
                {{-- <p>"{{ $quotes->quotes }}" - {{ $quotes->author }} --}}
                </p>
            </blockquote>

            {{-- Input Data --}}
            <div class="p-8 mt-10 bg-white shadow-xl rounded-xl">
                <h2 class="text-3xl">Masukan Data Kesehatan Anda</h2>
                <p>Data kesehatan akan digunakan untuk memprediksi apakah anda berisiko terkena <b>penyakit serangan
                        jantung</b> atau tidak.</p>

                <form>
                    {{-- Usia --}}
                     <div class="mt-4 mb-6">
                            <x-forms.label-popover :for="'age'"
                            :text="'Usia'"
                            popover-target="popover-tes" popover-id="popover-tes" popover-title="Usia" popover-description="Usia pasien dalam tahun. Semakin tua usia seseorang, semakin besar risiko terkena serangan jantung, terutama jika ada faktor risiko lainnya." 
                            />
                            <x-forms.text-input :type="'number'" :id="'age'" :placeholder="'Masukan Usia'" />
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'sex'"
                        :text="'Jenis Kelamin'"
                        popover-target="popover-sex" popover-id="popover-sex" popover-title="Jenis Kelamin" popover-description="Pria sering kali memiliki risiko lebih tinggi untuk terkena serangan jantung pada usia yang lebih muda dibandingkan dengan wanita." 
                        />
                       <x-forms.select-input 
                       id="sex" 
                       name="sex" 
                       :options="['0' => 'Perempuan', '1' => 'Laki-Laki']" 
                       placeholder="Pilih Jenis Kelamin" 
                       selected="{{ old('sex') }}" 
                       />
                    </div>

                    {{-- Nyeri Dada --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'cp'"
                        :text="'Chest Pain'"
                        popover-target="popover-cp" popover-id="popover-cp" popover-title="Jenis Kelamin" popover-description="Pria sering kali memiliki risiko lebih tinggi untuk terkena serangan jantung pada usia yang lebih muda dibandingkan dengan wanita." 
                        />
                       <x-forms.select-input 
                       id="cp" 
                       name="cp" 
                       :options="['0' => 'Typical Angina (nyeri dada khas akibat jantung)', '1' => 'Atypical Angina (nyeri dada tidak khas)', '2' => 'Non-anginal Pain (nyeri dada bukan karena jantung)', '3' => 'Asymptomatic (tidak ada gejala nyeri dada)']" 
                       placeholder="Pilih Chest Pain" 
                       selected="{{ old('cp') }}" 
                       />
                    </div>

                    {{-- Tekanan Darah Saat Istirahat --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'trestbps'"
                            :text="'Tekanan Darah Saat Istirahat'"
                            popover-target="popover-trestbps" popover-id="popover-trestbps" popover-title="Tekanan Darah Saat Istirahat" popover-description="Tekanan darah pasien yang diukur saat dalam keadaan istirahat, dinyatakan dalam milimeter merkuri (mm Hg)." 
                            />
                        <x-forms.text-input :type="'number'" :id="'trestbps'" :placeholder="'Masukan Tekanan Darah Saat Istirahat (mm Hg)'" />
                    </div>

                    {{-- Kolesterol --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'chol'"
                            :text="'Kolesterol (Cholesterol)'"
                            popover-target="popover-chol" popover-id="popover-chol" popover-title="Kolesterol" popover-description="Kadar kolesterol serum dalam darah. Kolesterol yang tinggi dapat meningkatkan risiko terkena serangan jantung." 
                            />
                        <x-forms.text-input :type="'number'" :id="'chol'" :placeholder="'Masukan Kolesterol (mg/dL)'" />
                    </div>

                    {{-- Gula Darah Puasa (FastingBS) --}}
                    <div class="mt-4 mb-6">
                       <x-forms.label-popover :for="'fbs'"
                        :text="'Fasting Blood Sugar'"
                        popover-target="popover-fbs" popover-id="popover-fbs" popover-title="Fasting Blood Sugar" popover-description="Pria sering kali memiliki risiko lebih tinggi untuk terkena serangan jantung pada usia yang lebih muda dibandingkan dengan wanita." 
                        />
                       <x-forms.select-input 
                       id="fbs" 
                       name="fbs" 
                       :options="['0' => 'Gula darah puasa < 120 mg/dl', '1' => 'Gula darah puasa ≥ 120 mg/dl']" 
                       placeholder="Pilih Fasting Blood Sugar" 
                       selected="{{ old('fbs') }}" 
                       />
                    </div>

                    {{-- Elektrodiagram Saat Istirahat (RestingECG) --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'restecg'"
                        :text="'Resting electrocardiographic results'"
                        popover-target="popover-restecg" popover-id="popover-restecg" popover-title="Resting electrocardiographic results" popover-description="Pria sering kali memiliki risiko lebih tinggi untuk terkena serangan jantung pada usia yang lebih muda dibandingkan dengan wanita." 
                        />
                       <x-forms.select-input 
                       id="restecg" 
                       name="restecg" 
                       :options="['0' => 'Normal', '1' => 'ST-T wave normality', '2' => 'Left ventricular hypertrophy']" 
                       placeholder="Pilih Resting electrocardiographic results" 
                       selected="{{ old('restecg') }}" 
                       />
                    </div>

                    {{-- Detak Jantung Maksimum --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'thalach'"
                            :text="'Detak Jantung Maksimum'"
                            popover-target="popover-thalach" popover-id="popover-thalach" popover-title="Detak Jantung Maksimum" popover-description="Jumlah detak jantung maksimum per menit yang bisa dicapai selama latihan yang sangat intens. Respon abnormal terhadap latihan bisa menunjukkan masalah jantung." 
                            />
                        <x-forms.text-input :type="'number'" :id="'thalach'" :placeholder="'Masukan Detak Jantung Maksimum (bpm)'" />
                    </div>

                    {{-- Angina saat olahraga (ExerciseAngina) --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'exang'"
                        :text="'Exercise induced angina'"
                        popover-target="popover-exang" popover-id="popover-exang" popover-title=" Exercise induced angina" popover-description="Pria sering kali memiliki risiko lebih tinggi untuk terkena serangan jantung pada usia yang lebih muda dibandingkan dengan wanita." 
                        />
                       <x-forms.select-input 
                       id="exang" 
                       name="exang" 
                       :options="['0' => 'Iya', '1' => 'Tidak']" 
                       placeholder="Pilih Angina saat Olahraga (ExerciseAngina)" 
                       selected="{{ old('exang') }}" 
                       />
                    </div>

                    {{-- Depresi ST (Oldpeak) --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'oldpeak'"
                            :text="'Depresi ST (Oldpeak)'"
                            popover-target="popover-oldpeak" popover-id="popover-oldpeak" popover-title="Depresi ST (oldpeak)" popover-description="Pengurangan segmen ST pada EKG, diukur dalam mm. Ini dapat memberikan indikasi tentang keparahan penyumbatan atau kerusakan pada jantung. Depresi ST yang signifikan sering dikaitkan dengan adanya masalah pada jantung, khususnya saat ada penyumbatan arteri koroner." 
                            />
                        <x-forms.text-input :type="'number'" :id="'oldpeak'" :placeholder="'Masukan Depresi ST (mm)'" />
                    </div>

                    {{-- Kemiringan Segmen ST (ST_Slope) --}}
                    <div class="mt-4 mb-6">
                        <div class="mt-4 mb-6">
                            <x-forms.label-popover :for="'slope'"
                                :text="'Slope'"
                                popover-target="popover-slope" popover-id="popover-slope" popover-title="Slope" popover-description="Pengurangan segmen ST pada EKG, diukur dalam mm. Ini dapat memberikan indikasi tentang keparahan penyumbatan atau kerusakan pada jantung. Depresi ST yang signifikan sering dikaitkan dengan adanya masalah pada jantung, khususnya saat ada penyumbatan arteri koroner." 
                                />
                            <x-forms.text-input :type="'number'" :id="'slope'" :placeholder="'Masukan Slope'" />
                        </div>
                    </div>

                    {{-- Jumlah Pembuluh Darah Utama yang Diketahui dari Fluoroskopi (ca) --}}
                    <div class="mt-4 mb-6">
                        <x-forms.label-popover :for="'ca'"
                            :text="'Pembuluh Darah Utama yang Diketahui dari Fluoroskopi (0-3)'"
                            popover-target="popover-ca" popover-id="popover-ca" popover-title="Jumlah Pembuluh Darah Utama yang Diketahui dari Fluoroskopi" popover-description="Jumlah pembuluh darah utama (0-3) yang terlihat melalui fluoroskopi. Semakin banyak pembuluh darah yang teridentifikasi, semakin besar risiko penyumbatan." 
                            />
                        <x-forms.text-input :type="'number'" :id="'ca'" :placeholder="'Masukan Jumlah Pembuluh Darah Utama yang Diketahui dari Fluoroskopi (0-3)'" />
                    </div>

                    {{-- Thalassemia (thal) --}}
                    <div class="mt-4 mb-6">
                        <label for="thal"
                            class="flex items-center mb-2 text-sm font-medium text-gray-900 dark:text-white">Thalassemia (thal)
                            <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                                type="button"><svg class="w-4 h-4 text-gray-400 ms-1 hover:text-gray-500"
                                    aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="sr-only">Show information</span></button></label>
                        <div data-popover id="popover-description" role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental
                                </h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart
                                    should have a growing trend, as stagnating chart signifies a significant decrease of
                                    community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means
                                    that activities in period n contain all activities up to period n, plus the
                                    activities generated by your community in period.</p>
                                <a href="#"
                                    class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                    more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg></a>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <select id="thal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih Thalassemia (thal)</option>
                            <option value="0">Tidak Ada Penyakit</option>
                            <option value="1">Fixed defect (jaringan jantung tidak dapat menyerap thallium baik saat istirahat maupun saat latihan)</option>
                            <option value="2">Reversible defect (jaringan jantung tidak dapat menyerap thallium hanya saat berolahraga)</option>
                        </select>

                        <div class="mt-4 mb-6">
                            <x-forms.label-popover :for="'slope'"
                                :text="'Slope'"
                                popover-target="popover-slope" popover-id="popover-slope" popover-title="Slope" popover-description="Pengurangan segmen ST pada EKG, diukur dalam mm. Ini dapat memberikan indikasi tentang keparahan penyumbatan atau kerusakan pada jantung. Depresi ST yang signifikan sering dikaitkan dengan adanya masalah pada jantung, khususnya saat ada penyumbatan arteri koroner." 
                                />
                            <x-forms.text-input :type="'number'" :id="'slope'" :placeholder="'Masukan Slope'" />
                        </div>

                    </div>

                    {{-- Predict Button --}}
                    <a href="#_" class="relative px-5 py-3 overflow-hidden font-medium text-gray-600 bg-gray-100 border border-gray-100 rounded-lg shadow-inner group">
                        <span class="absolute top-0 left-0 w-0 h-0 transition-all duration-200 border-t-2 border-gray-600 group-hover:w-full ease"></span>
                        <span class="absolute bottom-0 right-0 w-0 h-0 transition-all duration-200 border-b-2 border-gray-600 group-hover:w-full ease"></span>
                        <span class="absolute top-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-gray-600 group-hover:h-full ease"></span>
                        <span class="absolute bottom-0 left-0 w-full h-0 transition-all duration-300 delay-200 bg-gray-600 group-hover:h-full ease"></span>
                        <span class="absolute inset-0 w-full h-full duration-300 delay-300 bg-gray-900 opacity-0 group-hover:opacity-100"></span>
                        <span class="relative transition-colors duration-300 delay-200 group-hover:text-white ease">Prediksi Hasil</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
