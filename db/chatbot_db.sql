-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2025 a las 00:43:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `pregunta`, `respuesta`, `categoria`) VALUES
(1, '¿Qué es un sistema operativo?', 'El sistema operativo es el programa principal que gestiona los recursos de la computadora. Organiza la memoria, el procesador, el almacenamiento y los dispositivos conectados, permitiendo que funcionen correctamente otras aplicaciones.', 'Sistema operativo (Windows)'),
(2, '¿Qué es Windows 10?', 'Windows 10 es un sistema operativo desarrollado por Microsoft. Fue lanzado en 2015 como sucesor de Windows 8.1 e incluye una interfaz gráfica con ventanas y un menú Inicio para ejecutar aplicaciones.', 'Sistema operativo (Windows)'),
(3, '¿Qué es Windows 11?', 'Windows 11 es la versión más reciente del sistema operativo Windows desarrollada por Microsoft. Fue lanzado oficialmente en octubre de 2021 e incluye un diseño renovado, un menú Inicio centrado y mejoras de seguridad y rendimiento.', 'Sistema operativo (Windows)'),
(4, '¿Para qué sirve un sistema operativo?', 'Un sistema operativo sirve para coordinar y controlar el funcionamiento de la computadora. Gestiona el uso de la memoria, el procesador y los dispositivos, y proporciona una interfaz gráfica para que el usuario pueda ejecutar aplicaciones de forma sencilla.', 'Sistema operativo (Windows)'),
(5, '¿Qué es Linux?', 'Linux es un sistema operativo de código abierto creado por Linus Torvalds en 1991. Es muy versátil y se utiliza en servidores, computadoras personales y dispositivos móviles. Como es libre, cualquiera puede verlo, modificarlo y distribuirlo.', 'Sistema operativo (Linux)'),
(6, '¿Qué es una distribución Linux?', 'Una distribución de Linux es una versión del sistema operativo que incluye el núcleo de Linux más software adicional (como un instalador, programas básicos y entornos gráficos). Ejemplos de distribuciones populares son Ubuntu, Fedora y Debian.', 'Sistema operativo (Linux)'),
(7, '¿Qué es Ubuntu?', 'Ubuntu es una distribución popular de Linux orientada a usuarios de escritorio y servidores. Se caracteriza por ser fácil de usar y suele incluir un entorno gráfico amigable y aplicaciones preinstaladas.', 'Sistema operativo (Linux)'),
(8, '¿En qué se diferencia Linux de Windows?', 'Linux y Windows son sistemas operativos diferentes. Windows es de código cerrado y propiedad de Microsoft, mientras que Linux es libre y de código abierto. Linux tiende a ser más seguro y personalizable, y es muy usado en servidores; Windows es más común en computadoras personales y tiene gran compatibilidad con software comercial.', 'Sistema operativo (Linux)'),
(9, '¿Qué es una aplicación informática?', 'Una aplicación informática es un programa diseñado para realizar tareas específicas para el usuario. Por ejemplo, un procesador de texto sirve para escribir documentos, un navegador web permite navegar por Internet y un reproductor multimedia reproduce videos o música.', 'Software Aplicaciones'),
(10, '¿Qué es un navegador web?', 'Un navegador web es una aplicación que permite al usuario acceder y visualizar páginas en Internet. Interpreta el código de las páginas web (HTML, CSS, JavaScript) y muestra el contenido (texto, imágenes, videos) de forma gráfica. Ejemplos de navegadores comunes son Chrome, Firefox y Edge.', 'Software Aplicaciones'),
(11, '¿Qué es un procesador de texto?', 'Un procesador de texto es un programa para crear, editar y dar formato a documentos escritos. Permite escribir texto, cambiar la tipografía y el tamaño de letra, y agregar elementos como imágenes y tablas. Ejemplos de procesadores de texto son Microsoft Word y LibreOffice Writer.', 'Software Aplicaciones'),
(12, '¿Qué es una hoja de cálculo?', 'Una hoja de cálculo es una aplicación que permite organizar datos en filas y columnas para realizar cálculos automáticamente. Cada celda puede contener números o fórmulas, y el software calcula valores como sumas, promedios o totales. Un ejemplo común de hoja de cálculo es Microsoft Excel.', 'Software Aplicaciones'),
(13, '¿Qué es un editor de imágenes?', 'Un editor de imágenes es un programa que permite crear o modificar fotografías y gráficos digitales. Con él puedes recortar imágenes, ajustar colores, añadir texto o aplicar efectos especiales. Ejemplos de editores de imágenes son Adobe Photoshop y GIMP.', 'Software Aplicaciones'),
(14, '¿Qué es un reproductor multimedia?', 'Un reproductor multimedia es una aplicación que permite reproducir archivos de audio y video. Lee formatos de música y video, y los reproduce en tu pantalla o altavoces. Ejemplos de reproductores multimedia son VLC y Windows Media Player.', 'Software Aplicaciones'),
(15, '¿Qué es Internet?', 'Internet es una red global de computadoras interconectadas que permite el intercambio de información a nivel mundial. Utiliza protocolos de comunicación estándar (como TCP/IP) para enviar y recibir datos entre dispositivos. A través de Internet se accede a servicios como la web, el correo electrónico y las redes sociales.', 'Conectividad'),
(16, '¿Qué es una red local (LAN)?', 'Una LAN (Local Area Network) es una red que conecta dispositivos como computadoras e impresoras en un área geográfica limitada, por ejemplo una oficina o una casa. Permite compartir recursos (archivos, impresoras, conexión a Internet) entre los equipos conectados, ya sea por cable Ethernet o de forma inalámbrica.', 'Conectividad'),
(17, '¿Qué es un router?', 'Un router es un dispositivo de red que dirige el tráfico de datos entre diferentes redes. Por ejemplo, conecta tu red local de casa con Internet. El router recibe paquetes de datos y los envía por la ruta adecuada, asegurando que lleguen a su destino correcto.', 'Conectividad'),
(18, '¿Qué es un módem?', 'Un módem es un dispositivo que convierte las señales digitales de la computadora en señales analógicas para transmitirlas por las líneas telefónicas o de cable, y viceversa. Es el equipo que conecta tu red local con el proveedor de Internet.', 'Conectividad'),
(19, '¿Qué es Wi-Fi?', 'Wi-Fi es una tecnología de comunicación inalámbrica que permite conectar dispositivos a una red local o a Internet sin cables. Utiliza ondas de radio para transmitir datos entre los dispositivos y un punto de acceso (como un router). Wi-Fi permite que móviles, computadoras y otros equipos se comuniquen sin estar físicamente conectados.', 'Conectividad'),
(20, '¿Qué es Bluetooth?', 'Bluetooth es una tecnología de comunicación inalámbrica de corto alcance. Se utiliza para conectar dispositivos cercanos (como auriculares, teléfonos, teclados o altavoces) de forma rápida y sin cables, generalmente en distancias de hasta unos 10 metros.', 'Conectividad'),
(21, '¿Qué es una dirección IP?', 'Una dirección IP es un identificador numérico único que se asigna a cada dispositivo conectado a una red. Sirve para ubicar y distinguir los equipos en la red, permitiendo que se envíen y reciban datos correctamente entre computadoras e Internet.', 'Conectividad'),
(22, '¿Qué es un servidor?', 'Un servidor es una computadora especialmente configurada para ofrecer servicios y recursos a otras computadoras (clientes) a través de una red. Por ejemplo, un servidor web almacena páginas de Internet y las envía a los navegadores de los usuarios cuando las solicitan.', 'Conectividad'),
(23, '¿Qué es la nube (cloud)?', 'La \'nube\' (cloud) es un conjunto de servidores remotos a los que se accede a través de Internet para guardar archivos o usar aplicaciones sin instalarlas en tu equipo. Por ejemplo, servicios como Google Drive o Dropbox almacenan tus datos en la nube, permitiéndote acceder a ellos desde cualquier lugar con Internet.', 'Conectividad'),
(24, '¿Qué es hardware?', 'El hardware es la parte física de una computadora. Incluye componentes que puedes ver y tocar, como la placa base, el procesador, la memoria RAM, el disco duro y los periféricos (teclado, ratón, impresora, etc.). El hardware ejecuta las instrucciones que le envía el software.', 'Hardware'),
(25, '¿Cuál es la diferencia entre hardware y software?', 'El hardware son las partes físicas de la computadora (componentes electrónicos y mecánicos), mientras que el software son los programas e instrucciones (información) que le indican al hardware qué hacer. Por ejemplo, un teclado es hardware y el procesador de textos que usas con el teclado es software.', 'Hardware'),
(26, '¿Qué es una placa base (tarjeta madre)?', 'La placa base (tarjeta madre) es el componente principal de la computadora que conecta todos los demás. En ella se instalan el procesador, la memoria RAM, las tarjetas de expansión y otros componentes. Proporciona conexiones eléctricas y lógicas para que los componentes se comuniquen entre sí.', 'Hardware'),
(27, '¿Qué es la memoria RAM?', 'La memoria RAM (Random Access Memory) es la memoria principal de trabajo de la computadora. Se utiliza para cargar programas y datos de forma rápida mientras el equipo está encendido. Cuando ejecutas un programa, este se carga en la RAM para que el procesador pueda acceder a sus datos rápidamente; al apagar el equipo, la información en la RAM se borra.', 'Hardware'),
(28, '¿Qué es un disco duro (HDD/SSD)?', 'El disco duro es el dispositivo de almacenamiento permanente donde se guardan los datos, programas y el sistema operativo. Hay dos tipos comunes: HDD (disco duro mecánico) y SSD (unidad de estado sólido). Los HDD usan partes móviles para leer/escribir datos, mientras que los SSD usan memoria flash y son más rápidos.', 'Hardware'),
(29, '¿Qué es un procesador (CPU)?', 'El procesador o CPU es el cerebro de la computadora. Es el componente que realiza los cálculos y operaciones básicas según las instrucciones del software. Ejecuta programas y procesa datos; su velocidad y número de núcleos determinan cuánto puede hacer el equipo a la vez.', 'Hardware'),
(30, '¿Qué es una tarjeta gráfica?', 'La tarjeta gráfica es el componente que se encarga de generar las imágenes que ves en la pantalla. Procesa los datos gráficos de los programas y juegos, y convierte esa información en señales que el monitor puede mostrar. Tener una tarjeta gráfica potente mejora el rendimiento en juegos y edición de video.', 'Hardware'),
(31, '¿Qué es un periférico de entrada o salida?', 'Un periférico es un dispositivo externo que se conecta a la computadora para entrar o salir información. Los de entrada permiten introducir datos (como teclado, ratón o micrófono) y los de salida muestran o envían resultados (como monitor, impresora o altavoces).', 'Hardware'),
(32, '¿Qué es un controlador o driver?', 'Un controlador (driver) es un programa especial que permite que el sistema operativo se comunique con un dispositivo de hardware. Actúa como traductor entre el hardware (por ejemplo, una impresora o tarjeta gráfica) y el software, facilitando que ambos funcionen juntos.', 'Hardware'),
(33, '¿Para qué sirve un controlador (driver)?', 'Un driver sirve para controlar y manejar el hardware conectado al ordenador. Sin el driver adecuado, el sistema operativo no sabría cómo usar ese dispositivo. Por ejemplo, un driver de impresora permite que el computador envíe correctamente un documento a imprimir.', 'Hardware'),
(34, '¿Cómo puedo actualizar los drivers de mi computadora?', 'Para actualizar drivers, generalmente se puede usar el Administrador de dispositivos de Windows o visitar la web del fabricante del dispositivo. Desde allí se descargan los controladores más recientes. Mantener los drivers actualizados ayuda a mejorar el rendimiento del hardware y a resolver posibles errores.', 'Hardware'),
(35, '¿Qué es un virus informático?', 'Un virus informático es un tipo de programa malicioso que se replica e infecta archivos de tu computadora. Una vez activo, puede dañar datos, robar información o afectar el funcionamiento de tu equipo, y se propaga copiándose dentro de otros archivos o enviándose a través de redes e Internet.', 'Seguridad'),
(36, '¿Qué es el malware?', 'El malware es un término general para cualquier software malicioso. Incluye virus, gusanos, troyanos y spyware. Su objetivo es dañar, espiar o tomar el control de computadoras sin permiso del usuario.', 'Seguridad'),
(37, '¿Qué es un antivirus?', 'Un antivirus es un programa diseñado para detectar, bloquear y eliminar virus y otros programas maliciosos. Escanea los archivos del computador buscando código dañino, y previene infecciones informáticas, ayudando a mantener segura la información.', 'Seguridad'),
(38, '¿Por qué es importante tener un antivirus?', 'Tener un antivirus actualizado ayuda a proteger tu computadora del malware. Detecta virus, troyanos y otras amenazas antes de que causen daño. Gracias al antivirus puedes evitar pérdidas de datos, robos de información y el control de tu equipo por parte de atacantes.', 'Seguridad'),
(39, '¿Qué es un firewall (cortafuegos)?', 'Un firewall, o cortafuegos, es un sistema de seguridad que controla el tráfico de datos entre tu computadora (o red local) y otras redes (como Internet). Decide qué conexiones son permitidas o bloqueadas. Ayuda a prevenir que programas maliciosos entren a tu equipo y limita el acceso no autorizado.', 'Seguridad'),
(40, '¿Qué es el phishing?', 'El phishing es un tipo de fraude en Internet donde alguien intenta engañar al usuario para que entregue información personal (como contraseñas o datos bancarios) haciéndose pasar por sitios o correos legítimos. Por ejemplo, mediante mensajes falsos que imitan un banco para robar datos.', 'Seguridad'),
(41, '¿Cómo puedo proteger mi computadora de virus y ataques?', 'Para proteger tu computadora: instala un buen antivirus y mantenlo actualizado; actualiza también el sistema operativo y aplicaciones; no abras correos o archivos sospechosos; usa contraseñas seguras y únicas. Además, puedes usar un firewall y hacer copias de seguridad de tus datos con regularidad.', 'Seguridad'),
(42, '¿Qué es un troyano informático?', 'Un troyano informático es un tipo de malware que se disfraza como un programa legítimo pero contiene código dañino. Una vez instalado, puede permitir que un atacante controle tu equipo o robe tu información sin que te des cuenta.', 'Seguridad'),
(43, '¿Qué es el ransomware?', 'El ransomware es un malware que cifra los archivos de tu computadora y exige un rescate (dinero) a cambio de recuperarlos. Protege tus datos haciendo copias de seguridad con frecuencia y manteniendo el antivirus y el sistema operativo actualizados para evitar esta amenaza.', 'Seguridad'),
(44, '¿Qué es un gusano informático?', 'Un gusano informático es un tipo de malware que se replica a sí mismo para propagarse a otros equipos a través de redes. A diferencia de los virus, no necesita adjuntarse a archivos; puede propagarse de forma autónoma y consumir recursos del sistema.', 'Seguridad'),
(45, '¿Qué diferencia hay entre virus y malware?', 'Un virus es un tipo específico de malware. El término \"malware\" abarca todos los programas maliciosos, incluyendo virus, gusanos, troyanos, spyware y ransomware.', 'Seguridad'),
(46, '¿Qué es el software espía (spyware)?', 'El spyware es un programa malicioso que se instala sin permiso para recopilar información del usuario, como hábitos de navegación, contraseñas o datos personales, y enviarlos a terceros.', 'Seguridad'),
(47, '¿Qué es una actualización de seguridad?', 'Una actualización de seguridad es una corrección que aplican los desarrolladores de software para resolver vulnerabilidades descubiertas. Instalar estas actualizaciones protege el sistema contra posibles ataques.', 'Seguridad'),
(48, '¿Qué son las buenas prácticas de ciberseguridad?', 'Algunas buenas prácticas son: usar contraseñas seguras, no repetirlas, actualizar los sistemas, no abrir enlaces sospechosos, tener antivirus, y hacer copias de seguridad frecuentes.', 'Seguridad'),
(49, '¿Qué hacer si creo que mi computadora tiene un virus?', 'Si sospechás de un virus: desconectá la computadora de Internet, escaneá el sistema con un antivirus actualizado, eliminá el archivo infectado o ponelo en cuarentena, y evitá usar contraseñas hasta limpiarlo.', 'Seguridad'),
(50, '¿Qué es la autenticación de dos factores?', 'Es una capa extra de seguridad donde, además de la contraseña, se necesita un segundo paso para acceder, como un código enviado al celular. Esto reduce el riesgo de que otra persona acceda a tu cuenta.', 'Seguridad'),
(51, '¿Qué es el comando ping en Windows o Linux?', 'El comando ping sirve para comprobar si una computadora puede comunicarse con otra en la red. Envía paquetes y mide el tiempo que tardan en recibir respuesta. Es útil para diagnosticar problemas de conexión.', 'Conectividad'),
(52, '¿Qué significa que una red tiene NAT?', 'NAT (Traducción de Direcciones de Red) permite que varios dispositivos compartan una única IP pública. Es común en redes domésticas y ayuda a proteger los dispositivos internos de accesos externos no autorizados.', 'Conectividad'),
(53, '¿Qué es una IP dinámica?', 'Una IP dinámica es una dirección asignada automáticamente por un servidor DHCP. Puede cambiar con el tiempo, a diferencia de una IP fija que siempre es la misma.', 'Conectividad'),
(54, '¿Qué diferencia hay entre un módem y un router?', 'El módem conecta tu red con Internet. El router distribuye esa conexión entre varios dispositivos. Algunos equipos combinan ambas funciones.', 'Conectividad'),
(55, '¿Qué es una VPN?', 'Una VPN (Red Privada Virtual) permite navegar por Internet de forma segura y privada al cifrar la conexión y ocultar la dirección IP. Se usa para proteger datos y acceder a contenidos restringidos.', 'Conectividad'),
(56, '¿Qué es el comando ipconfig?', 'Es un comando de Windows que muestra la configuración de red del dispositivo: dirección IP, máscara de subred, puerta de enlace, etc. Se usa para diagnosticar problemas de red.', 'Conectividad'),
(57, '¿Qué es el comando ifconfig o ip a en Linux?', 'Son comandos de Linux para ver (y a veces modificar) la configuración de red. Muestran la IP del equipo, interfaces activas y detalles de conexión.', 'Conectividad'),
(58, '¿Qué es la interfaz de red?', 'Es el componente (físico o virtual) que permite que una computadora se conecte a una red. Puede ser una tarjeta de red Ethernet, Wi-Fi o adaptador virtual.', 'Conectividad'),
(59, '¿Qué significa actualizar el sistema operativo?', 'Es instalar las últimas versiones y parches del sistema. Mejora la seguridad, corrige errores y agrega funciones nuevas. Mantener el sistema actualizado es esencial.', 'Windows'),
(60, '¿Qué es el registro de Windows?', 'Es una base de datos interna donde Windows guarda configuraciones del sistema y de programas instalados. Modificarlo sin conocimientos puede causar errores.', 'Windows'),
(61, '¿Qué es el comando cd en Linux o Windows?', 'El comando cd se usa para cambiar de directorio en la línea de comandos. Por ejemplo, cd Documentos te lleva a esa carpeta.', 'Linux'),
(62, '¿Qué es un archivo ejecutable en Windows?', 'Es un archivo que al abrirse inicia un programa. Generalmente tiene extensión .exe. Ejecuta instrucciones para que una aplicación funcione.', 'Windows'),
(63, '¿Qué es el administrador de tareas de Windows?', 'Es una herramienta que permite ver y controlar los procesos, el uso del CPU, la memoria, las aplicaciones abiertas y más. Se accede con Ctrl + Shift + Esc.', 'Windows'),
(64, '¿Qué significa que un sistema es de código abierto?', 'Significa que el código fuente está disponible para que cualquiera lo estudie, modifique o distribuya. Linux es un ejemplo clásico de software de código abierto.', 'Linux'),
(65, '¿Qué es el entorno de escritorio en Linux?', 'Es la interfaz gráfica que usan los usuarios en Linux. Algunos ejemplos son GNOME, KDE y XFCE. Define cómo se ven y se usan las ventanas, menús y botones.', 'Linux'),
(66, '¿Qué es sudo en Linux?', 'sudo es un comando que permite ejecutar acciones como administrador o superusuario. Se usa para tareas que requieren permisos elevados.', 'Linux'),
(67, '¿Cómo se instala un programa en Linux?', 'En la mayoría de distribuciones, se usa un gestor de paquetes. Por ejemplo, en Ubuntu se puede usar sudo apt install nombre-del-programa.', 'Linux'),
(68, '¿Qué es un servicio en segundo plano?', 'Es un programa que se ejecuta sin mostrar una ventana visible. Por ejemplo, el antivirus o el servicio de red funcionan todo el tiempo en segundo plano.', 'Software Aplicaciones'),
(69, '¿Qué es un archivo comprimido?', 'Es un archivo que contiene uno o más archivos combinados en uno solo con menor tamaño. Se usan para facilitar el envío y almacenamiento. Ejemplos: .zip, .rar.', 'Software Aplicaciones'),
(70, '¿Qué es Microsoft Office?', 'Es un conjunto de aplicaciones de oficina desarrollado por Microsoft. Incluye programas como Word, Excel, PowerPoint y Outlook.', 'Software Aplicaciones'),
(71, '¿Qué es LibreOffice?', 'LibreOffice es una suite ofimática gratuita y de código abierto. Incluye procesador de texto, hoja de cálculo, presentaciones, base de datos, y más.', 'Software Aplicaciones'),
(72, '¿Qué es un driver de impresora?', 'Es el programa que permite al sistema operativo comunicarse correctamente con la impresora. Sin él, la impresora no funcionará bien o no será detectada.', 'Hardware'),
(73, '¿Qué puede causar que una impresora no funcione?', 'Algunas causas comunes son: cable mal conectado, cartucho sin tinta, papel atascado, driver desactualizado o cola de impresión detenida.', 'Hardware'),
(74, '¿Qué hacer si no tengo sonido en la computadora?', 'Verificá si el volumen está bajo o silenciado, si los parlantes están conectados, o si el driver de audio está instalado correctamente.', 'Hardware'),
(75, '¿Qué es la BIOS?', 'La BIOS (o UEFI en equipos más modernos) es el sistema básico que se inicia antes del sistema operativo. Controla el hardware y permite configuraciones de bajo nivel.', 'Hardware'),
(76, '¿Qué significa formatear un disco?', 'Es borrar todo el contenido del disco y preparar el sistema de archivos para que pueda almacenar datos de nuevo. Se hace al instalar un sistema operativo o limpiar un disco.', 'Hardware'),
(77, '¿Qué es un sistema de archivos?', 'Es la forma en que el sistema operativo organiza y gestiona los archivos en un disco. Algunos ejemplos son NTFS (Windows), FAT32 y ext4 (Linux).', 'Hardware'),
(78, '¿Qué es el análisis completo del antivirus?', 'Es una revisión profunda del sistema que escanea todos los archivos, programas y discos en busca de amenazas. Puede tardar más tiempo que un análisis rápido.', 'Seguridad'),
(79, '¿Cómo saber si un archivo es sospechoso?', 'Si tiene un nombre raro, extensión doble (como foto.jpg.exe), proviene de un origen desconocido o pide permisos innecesarios, es mejor no abrirlo.', 'Seguridad'),
(80, '¿Qué hacer si me aparece un mensaje de “sitio web no seguro”?', 'No ingreses datos personales. El sitio puede no tener certificado HTTPS o puede ser falso. Cerrá la pestaña y verificá la URL.', 'Seguridad'),
(81, '¿Qué es el Escritorio Remoto en Windows?', 'Es una función que permite conectarse a otra computadora a través de la red y controlarla como si estuvieras frente a ella. Es útil para soporte técnico o trabajo a distancia.', 'Windows'),
(82, '¿Qué es el modo seguro de Windows?', 'Es una forma de iniciar Windows con funciones básicas. Se usa para diagnosticar problemas como errores de arranque, controladores defectuosos o virus.', 'Windows'),
(83, '¿Qué es un script en Linux?', 'Un script es un archivo de texto con una serie de comandos que se ejecutan en orden. Se usan para automatizar tareas, como instalar software o hacer respaldos.', 'Linux'),
(84, '¿Cómo abrir la terminal en Ubuntu?', 'Podés abrir la terminal presionando Ctrl + Alt + T o buscándola en el menú de aplicaciones. Desde allí podés ingresar comandos de Linux.', 'Linux'),
(85, '¿Qué es un paquete .deb?', 'Es un tipo de archivo que contiene software instalable en distribuciones basadas en Debian como Ubuntu. Se instala con el comando dpkg -i nombre.deb.', 'Linux'),
(86, '¿Qué es una red inalámbrica?', 'Es una red que conecta dispositivos sin cables, usando señales de radio (Wi-Fi). Permite acceder a Internet y compartir recursos desde distintos dispositivos.', 'Conectividad'),
(87, '¿Qué es el SSID de una red Wi-Fi?', 'Es el nombre visible de una red inalámbrica. Lo ves al buscar Wi-Fi desde tu teléfono o computadora. Puede ser personalizado o venir por defecto del router.', 'Conectividad'),
(88, '¿Qué es el ancho de banda?', 'Es la cantidad máxima de datos que se pueden transmitir por segundo en una red. Se mide en Mbps o Gbps. A mayor ancho de banda, mayor velocidad de transferencia.', 'Conectividad'),
(89, '¿Qué es una dirección MAC?', 'Es un identificador único asignado a cada tarjeta de red. A diferencia de la IP, no cambia y permite identificar dispositivos en la red.', 'Conectividad'),
(90, '¿Qué es una caída de red?', 'Es una interrupción en la conexión a Internet o a una red local. Puede deberse a fallas del proveedor, errores en el router, cables desconectados o problemas de software.', 'Conectividad'),
(91, '¿Qué es la multitarea en un sistema operativo?', 'Es la capacidad de ejecutar varios programas al mismo tiempo. El sistema distribuye el uso del procesador entre las tareas activas.', 'Sistema Operativo (general)'),
(92, '¿Qué es un archivo .iso?', 'Es una copia exacta (imagen) de un disco óptico. Se usa para distribuir sistemas operativos o software que antes venía en CD/DVD.', 'Software Aplicaciones'),
(93, '¿Qué es el portapapeles?', 'Es una función del sistema operativo que guarda temporalmente texto, imágenes o archivos que se copian o cortan, para luego pegarlos en otro lugar.', 'Software Aplicaciones'),
(94, '¿Qué es una extensión de archivo?', 'Es la parte final del nombre de un archivo que indica su tipo, como .docx para documentos de Word o .jpg para imágenes.', 'Software Aplicaciones'),
(95, '¿Qué es una licencia de software?', 'Es el permiso legal para usar un programa. Puede ser gratuita (como GPL), de pago, o limitada por tiempo o funcionalidad.', 'Software Aplicaciones'),
(96, '¿Qué significa \"software propietario\"?', 'Es software que no se puede modificar ni distribuir libremente. Su código fuente está cerrado y sólo el dueño puede hacer cambios. Ej: Microsoft Office.', 'Software Aplicaciones'),
(97, '¿Qué es una amenaza persistente avanzada (APT)?', 'Es un tipo de ataque sofisticado y prolongado, generalmente dirigido a organizaciones específicas para robar información sensible.', 'Seguridad'),
(98, '¿Qué es una contraseña segura?', 'Es una clave difícil de adivinar. Debe tener al menos 8 caracteres, incluir mayúsculas, minúsculas, números y símbolos, y evitar palabras comunes.', 'Seguridad'),
(99, '¿Por qué no es seguro usar la misma contraseña en todos lados?', 'Si una cuenta es hackeada, el atacante puede usar esa contraseña en otros sitios. Usar contraseñas distintas para cada servicio mejora la seguridad.', 'Seguridad'),
(100, '¿Qué hacer si olvidé mi contraseña de Windows?', 'Podés restablecerla desde otro usuario administrador, usar preguntas de seguridad, o acceder con una cuenta Microsoft y hacer recuperación online.', 'Windows');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
