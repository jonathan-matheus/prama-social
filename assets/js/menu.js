document.addEventListener("DOMContentLoaded", function () {
  // Função para inicializar os menus de navegação
  function initializeMenus() {
    const menuItems = document.querySelectorAll(
      ".navigation-menu .menu-item-has-children"
    );

    menuItems.forEach(function (menuItem) {
      const link = menuItem.querySelector("a");
      const submenu = menuItem.querySelector("ul");

      if (link && submenu) {
        // Adiciona atributos de acessibilidade
        link.setAttribute("aria-haspopup", "true");
        link.setAttribute("aria-expanded", "false");
        submenu.setAttribute("role", "menu");

        // Gera ID único para o submenu
        const submenuId = "submenu-" + Math.random().toString(36).substr(2, 9);
        submenu.setAttribute("id", submenuId);
        link.setAttribute("aria-controls", submenuId);

        // Adiciona event listeners para mouse
        menuItem.addEventListener("mouseenter", function () {
          link.setAttribute("aria-expanded", "true");
        });

        menuItem.addEventListener("mouseleave", function () {
          link.setAttribute("aria-expanded", "false");
        });

        // Adiciona event listeners para teclado
        link.addEventListener("keydown", function (e) {
          // Enter ou seta para baixo
          if (e.key === "Enter" || e.key === "ArrowDown") {
            e.preventDefault();
            link.setAttribute("aria-expanded", "true");
            const firstSubmenuLink = submenu.querySelector("a");
            if (firstSubmenuLink) {
              firstSubmenuLink.focus();
            }
          }

          // Escape
          if (e.key === "Escape") {
            link.setAttribute("aria-expanded", "false");
            link.focus();
          }
        });

        // Event listeners para itens do submenu
        const submenuLinks = submenu.querySelectorAll("a");
        submenuLinks.forEach(function (submenuLink, index) {
          submenuLink.addEventListener("keydown", function (e) {
            // Seta para cima
            if (e.key === "ArrowUp") {
              e.preventDefault();
              if (index === 0) {
                link.focus();
                link.setAttribute("aria-expanded", "false");
              } else {
                submenuLinks[index - 1].focus();
              }
            }

            // Seta para baixo
            if (e.key === "ArrowDown") {
              e.preventDefault();
              if (index < submenuLinks.length - 1) {
                submenuLinks[index + 1].focus();
              }
            }

            // Escape
            if (e.key === "Escape") {
              link.setAttribute("aria-expanded", "false");
              link.focus();
            }
          });
        });
      }
    });
  }

  // Função para lidar com cliques fora do menu (fechar submenus)
  function handleOutsideClick(event) {
    const menus = document.querySelectorAll(".navigation-menu");
    menus.forEach(function (menu) {
      if (!menu.contains(event.target)) {
        const expandedLinks = menu.querySelectorAll('[aria-expanded="true"]');
        expandedLinks.forEach(function (link) {
          link.setAttribute("aria-expanded", "false");
        });
      }
    });
  }

  // Função para melhorar a experiência em dispositivos móveis
  function initializeMobileMenu() {
    const menuItems = document.querySelectorAll(
      ".navigation-menu .menu-item-has-children > a"
    );

    menuItems.forEach(function (link) {
      // Clone o link original
      const originalHref = link.getAttribute("href");

      // Em dispositivos móveis, adiciona funcionalidade de toggle
      link.addEventListener("click", function (e) {
        if (window.innerWidth <= 768) {
          const submenu = link.nextElementSibling;

          if (submenu && submenu.tagName === "UL") {
            e.preventDefault();

            const isExpanded = link.getAttribute("aria-expanded") === "true";

            // Fecha outros submenus no mesmo nível
            const siblingItems =
              link.parentElement.parentElement.querySelectorAll(
                ".menu-item-has-children > a"
              );
            siblingItems.forEach(function (siblingLink) {
              if (siblingLink !== link) {
                siblingLink.setAttribute("aria-expanded", "false");
              }
            });

            // Toggle do submenu atual
            link.setAttribute("aria-expanded", isExpanded ? "false" : "true");
          }
        }
      });
    });
  }

  // Inicializa todas as funcionalidades
  initializeMenus();
  initializeMobileMenu();

  // Adiciona listener para cliques fora do menu
  document.addEventListener("click", handleOutsideClick);

  // Re-inicializa quando a janela é redimensionada
  window.addEventListener("resize", function () {
    initializeMobileMenu();
  });
});
