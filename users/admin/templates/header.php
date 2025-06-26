<header class="hidden md:flex justify-between items-center px-10 py-4 border-b border-gray-300">
  <div class="relative ml-auto">
    <button id="profileDropdownBtn" class="flex items-center space-x-3 text-[#15294B] text-sm font-normal focus:outline-none">
      <img 
        alt="Profile icon round photo" 
        class="w-10 h-10 rounded-full object-cover cursor-pointer" 
        height="40" 
        src="../../libs/images/Profile.png" 
        width="40" 
      />
    </button>

    <div id="profileDropdown" class="absolute right-0 mt-2 w-52 bg-[#ebf0f2] rounded-lg shadow-lg border border-gray-200 hidden z-50 transition-all duration-300">
      <ul class="py-2 text-sm text-[#1f365f]">
        <li>
          <a href="#" id="viewProfileBtn" class="dropdown-item flex items-center gap-3 px-4 py-2 hover:bg-white w-[190px] rounded-lg ml-[8px]">
            <img src="../../libs/images/Profile.png" alt="View Profile" class="w-5 h-5" />
            View Profile
          </a>
        </li>
        <li>
          <a href="#" class="dropdown-item flex items-center gap-3 px-4 py-2 hover:bg-white transition-colors duration-200 w-[190px] rounded-lg ml-[8px]">
            <img src="../../libs/images/Change Password.png" alt="Change Password" class="w-5 h-5" />
            Change Password
          </a>
        </li>
        <li>
          <a href="#" class="dropdown-item flex items-center gap-3 px-4 py-2 transition-all duration-200 hover:bg-white hover:text-red-600 text-[#1f365f] w-[190px] rounded-lg ml-[8px]">
            <img src="../../libs/images/Logout.png" alt="Logout" class="w-5 h-5" />
            Logout
          </a>
        </li>
      </ul>
    </div>

    <!-- View Profile Modal -->
    <div id="viewProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
      <div class="bg-white rounded-lg p-6 w-full max-w-md mx-4 relative">
        <button id="closeModalBtn" class="absolute top-2 right-3 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

        <!-- Upload Photo -->
        <div class="flex flex-col items-center mb-6">
          <img src="../../libs/images/Profile.png" alt="Profile" class="w-24 h-24 rounded-full object-cover border mb-4" />
          <input type="file" id="uploadPhoto" class="text-sm text-gray-600" />
        </div>

        <!-- Personal Info -->
        <h3 class="text-xl font-semibold text-[#15294B] mb-1">Personal Information</h3>
        <h5 class="text-sm text-[#737373] mb-4">Update your profile information</h5>

        <!-- Form Fields -->
        <form id="profileForm" class="space-y-4">
          <div>
            <label class="block text-sm text-[#15294B] mb-1">Full Name</label>
            <input type="text" class="w-full border border-[#071c42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#003968]" placeholder="Enter full name" />
          </div>
          <div>
            <label class="block text-sm text-[#15294B] mb-1">Email</label>
            <input type="email" class="w-full border border-[#071c42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#003968]" placeholder="Enter email" />
          </div>
          <div>
            <label class="block text-sm text-[#15294B] mb-1">Mobile Number</label>
            <input type="text" class="w-full border border-[#071c42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-[#003968]" placeholder="Enter mobile number" />
          </div>

          <!-- Buttons -->
          <div class="flex justify-end space-x-3 pt-4">
            <button type="submit" class="px-10 py-2 bg-[#003968] text-white rounded hover:bg-[#00284a] font-bold text-xs">SAVE</button>
            <button type="button" id="cancelBtn" class="px-8 py-2 bg-gray-300 text-[#15294B] rounded hover:bg-gray-400 font-bold text-xs">CANCEL</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
