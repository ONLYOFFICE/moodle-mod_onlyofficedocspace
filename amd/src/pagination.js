// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @module mod_onlyofficedocspace/pagination
 * @copyright  2025 Ascensio System SIA <integration@onlyoffice.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 **/

/**
 *
 * @param {String} selector
 * @param {Number} totalPages
 * @param {Number} currentPage
 * @param {?CallableFunction} onPageChange
 */
export const render = function(selector, totalPages, currentPage = 1, onPageChange = null) {
  const container = document.querySelector(selector);
  container.innerHTML = "";

  if (totalPages < 2) {
    return;
  }

  /**
  *
  * @param {String} label
  * @param {Number} page
  * @param {Boolean} disabled
  * @param {Boolean} active
  * @returns
  */
  function createItem(label, page, disabled = false, active = false) {
    const li = document.createElement("li");
    li.className = "page-item";

    if (disabled) {
      li.classList.add("disabled");
    }
    if (active) {
      li.classList.add("active");
    }

    const a = document.createElement("a");
    a.className = "page-link";
    a.href = "#";
    a.textContent = label;

    a.addEventListener("click", (e) => {
      e.preventDefault();
      if (!disabled && !active) {
        render(selector, totalPages, page, onPageChange);
        if (onPageChange) {
          onPageChange(page);
        }
      }
    });

    li.appendChild(a);
    return li;
  }

  // Prev
  container.appendChild(createItem("«", currentPage - 1, currentPage === 1));

  // Page numbers
  for (let i = 1; i <= totalPages; i++) {
    container.appendChild(createItem(i, i, false, i === currentPage));
  }

  // Next
  container.appendChild(createItem("»", currentPage + 1, currentPage === totalPages));
};
