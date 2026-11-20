public class Main {

    public static void main(String[] args) {
        // 1. Crear el objeto Producto
        Producto producto = new Producto("Ordenador", 799.99, 5);

        // 2. Mostrar la información del producto
        System.out.println("--- Información inicial ---");
        producto.mostrarInformacio();

        // 3. Modificar el precio mediante el setter
        producto.setPrecio(749.99);

        // 4. Mostrar nuevamente la información
        System.out.println("\n--- Información tras modificar el precio ---");
        producto.mostrarInformacio();
    }
}
