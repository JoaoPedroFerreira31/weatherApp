<x-app-layout>
    <div x-data="data()" class="grid grid-cols-1 py-8 lg:px-8 ">
        <div class="p-4 bg-white shadow-md rounded-xl">
            <div class="flex flex-col p-4">
                <div class="inline-flex items-center justify-between gap-2 pb-6 font-medium align-middle">
                    <div class="inline-flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" @click="navigateTo('dashboard')"
                            class="w-6 h-6 hover:underline hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>
                        <span class="hover:underline hover:cursor-pointer"
                            @click="navigateTo('dashboard')">@lang('back_to_dashboard')</span>
                    </div>

                    <div class="inline-flex items-center gap-2 align-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 hover:underline hover:cursor-pointer">
                            <path
                                d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                            <path
                                d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                        </svg>
                        <span @click="isEditing = !isEditing"
                            class="font-medium text-gray-900 hover:underline hover:cursor-pointer"
                            x-text="isEditing ? Lang.get('strings.cancel') : Lang.get('strings.edit')">@lang('edit')</span>
                    </div>
                </div>
                <h1 class="text-2xl font-semibold">@lang('account_settings')</h1>
                <span class="mt-1 text-sm text-gray-500">@lang('manage_your_account_information_and_settings')</span>
            </div>
            <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">

            <div class="grid px-10 py-20 lg:grid-cols-4">
                <div class="flex flex-col">
                    <h1 class="text-xl font-semibold">@lang('general_information')</h1>
                    <span class="mt-1 text-sm text-gray-500">@lang('here_you_can_manage_your_personal_data_update_contact_information_adjust_privacy_preferences')</span>
                </div>

                <form class="flex-col w-full mt-8 lg:col-span-3 lg:mt-0" @submit.prevent="updateUserData()">
                    <div class="inline-flex w-full">
                        <div class="w-1/2 px-10">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('username')</label>
                            <input type="text" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                disabled:bg-slate-50 disabled:text-slate-400 disabled:border-slate-200 disabled:shadow-none disabled:cursor-not-allowed"
                                :placeholder="Lang.get('strings.username')" x-model="userForm.name"
                                :disabled="!isEditing" required>
                        </div>
                        <div class="w-1/2 px-10">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">@lang('email')</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                                disabled:bg-slate-50 disabled:text-slate-400 disabled:border-slate-200 disabled:shadow-none disabled:cursor-not-allowed"
                                :placeholder="Lang.get('strings.email')" x-model="userForm.email" :disabled="!isEditing"
                                required>
                        </div>
                    </div>
                    <div x-show="isEditing" class="inline-flex justify-end w-full px-10 mt-2">
                        <x-submit-button/>
                    </div>
                </form>
            </div>

            <hr class="h-px mt-2 bg-gray-200 border-0 dark:bg-gray-700">
        </div>


    </div>
</x-app-layout>
<script>
    let backendRecord = @json($record);

    function data() {
        return {
            userForm: {
                name: null,
                email: null,
            },
            record: null,
            user: null,
            isSaving: false,
            isEditing: false,
            init() {
                try {
                    this.record = backendRecord;
                    this.userForm.name = this.record.name;
                    this.userForm.email = this.record.email;
                } catch (error) {
                    console.log(error);
                }

                // load data from localStorage
                if (typeof Storage !== 'undefined') {
                    //User data
                    localForage.getItem('user-data-' + this.record.id)
                        .then((value) => {
                            this.user = value;
                        })
                        .catch((err) => {
                            console.log(err)
                        });
                }
                this.fetchData();
            },
            fetchData() {
                axios.get(`api/users/${this.record.id}`)
                    .then((response) => {
                        this.user = response.data.data;
                        console.log(this.user);
                        saveStorage('user-data-' + this.user.id, response.data.data);
                    })
                    .catch((error) => console.log(error.message));
            },
            updateUserData() {
                console.log('saving...');
                this.isSaving = true;

                axios({
                    method: 'put',
                    url: `api/users/${this.record.id}`,
                    data: this.userForm,
                }).then((response) => {
                    this.isSaving = false;
                    this.isEditing = false;
                    this.fetchData();
                }).catch((error) => console.log(error.message));
            }
        }
    }
</script>
