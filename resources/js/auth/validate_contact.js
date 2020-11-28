function validate_contact(contact) {
    let numbers = /^[0-9]+$/
    if (contact.length >= 8 && contact.length <= 12 && contact.match(numbers)) {
        return true
    }
    return false
}
