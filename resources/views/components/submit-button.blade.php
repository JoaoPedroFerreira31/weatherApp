<button
    :class="{'cursor-not-allowed bg-red-500 hover:bg-red-600': isSaving, 'cursor-default bg-black hover:bg-gray-500': !isSaving}"
    :disabled="isSaving"
    type="submit"
    class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white transition duration-150 ease-in-out bg-black border border-transparent rounded-md shadow-sm hover:cursor-pointer hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2">
    <svg x-show="isSaving" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" style="display:none;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    <span x-text="isSaving ?  '@lang('saving')':  '@lang('save')'"></span>
</button>
