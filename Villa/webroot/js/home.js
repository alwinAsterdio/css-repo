const monitor_elements_visibility = document.querySelectorAll('.monitor-visibility');
const observer = new IntersectionObserver(updateImageEntry, {
    root: null,
    threshold: 0.1,
});

function updateImageEntry(entries, obs) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible')
            obs.unobserve(entry.target)
        }
    })
}

monitor_elements_visibility.forEach(elem => {
    observer.observe(elem);
})

document.addEventListener('DOMContentLoaded', function(event) {
    QoetixCustomFields.eventActions();
});

