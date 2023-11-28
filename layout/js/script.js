const selectElement = document.getElementById('productType');
const elementsToHide = document.querySelectorAll('.booksOption, .cdOption, .furnitureOption');
const elementsToUnrequire = document.querySelectorAll('.booksRequired, .cdRequired, .furnitureRequired');
const targetElement = document.getElementById('myTarget');

selectElement.addEventListener('change', (event) => {
    const selectedOption = event.target.selectedOptions[0].value;

    // Hide all elements initially
    for (const element of elementsToHide) {
        element.classList.add('hidden');
    }
    for (const element of elementsToUnrequire) {
        element.removeAttribute('required');
    }
    console.log(elementsToHide[0].classList);
    const elementToShow = '.' + selectedOption + 'Option';
    const elementToRequire = '.' + selectedOption + 'Required';
    const shownElement = document.querySelector(elementToShow);
    shownElement.classList.remove('hidden');
    document.querySelector(elementToRequire).setAttribute("required", true);
});