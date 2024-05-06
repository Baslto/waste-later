let createStoreProductButton = document.getElementById('create-store-product')
let createStoreProductModal = document.getElementById('create-store-product-modal')
let createStoreProductModalClose = document.getElementById('create-store-product-close')

let categoryMenuPoint = document.getElementById('category-menu-point')
let categoryDropdown = document.getElementById('category-dropdown')
createStoreProductModalClose.addEventListener('click', function(){
    toggleCreateModal(createStoreProductModal)
})

createStoreProductButton.addEventListener('click', function(){
    toggleCreateModal(createStoreProductModal)
})

function toggleCreateModal(modal) {
    modal.classList.toggle('hidden')
}
categoryMenuPoint.addEventListener('click', function(){
    categoryDropdown.classList.toggle('hidden')
})
