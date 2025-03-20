<!-- custom pagination -->
<div class="flex justify-center">
    <!-- Previous Button -->
    @if ($paginator->onFirstPage())
        <button disabled class="border border-black text-[#25D366] block rounded-sm font-bold py-2 px-2 flex items-center">
            <svg class="h-5 w-5 mr-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-49 141 512 512">
                <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
            </svg>
            Previous page
        </button>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="border border-black text-[#25D366] block rounded-sm font-bold py-2 px-2 flex items-center hover:bg-[#25D366] hover:text-white">
            <svg class="h-5 w-5 mr-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-49 141 512 512">
                <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
            </svg>
            Previous page
        </a>
    @endif

    <!-- Next Button -->
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="border border-black  text-black block rounded-sm font-bold py-2 px-4 ml-2 flex items-center hover:bg-[#25D366]">
            Next page
            <svg class="h-5 w-5 ml-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-49 141 512 512">
                <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0 l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0 c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z"/>
            </svg>
        </a>
    @else
        <button disabled class="border border-black bg-[#25D366] text-white block rounded-sm font-bold py-2 px-4 ml-2 flex items-center">
            Next page
            <svg class="h-5 w-5 ml-2 fill-current" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="-49 141 512 512">
                <path id="XMLID_11_" d="M-24,422h401.645l-72.822,72.822c-9.763,9.763-9.763,25.592,0,35.355c9.763,9.764,25.593,9.762,35.355,0 l115.5-115.5C460.366,409.989,463,403.63,463,397s-2.634-12.989-7.322-17.678l-115.5-115.5c-9.763-9.762-25.593-9.763-35.355,0 c-9.763,9.763-9.763,25.592,0,35.355l72.822,72.822H-24c-13.808,0-25,11.193-25,25S-37.808,422-24,422z"/>
            </svg>
        </button>
    @endif
</div>
