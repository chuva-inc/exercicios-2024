import 'package:chuva_dart/main.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:integration_test/integration_test.dart';

void main() {
  IntegrationTestWidgetsFlutterBinding.ensureInitialized();

  group('Calendar page', () {
    testWidgets('Valida estado inicial', (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());
      expect(find.text('Programação'), findsOneWidget);
      expect(find.text('Nov'), findsOneWidget);
      expect(find.text('2023'), findsOneWidget);
      expect(find.text('26'), findsOneWidget);
      expect(find.text('28'), findsOneWidget);
      expect(find.text('Mesa redonda de 07:00 até 08:00'), findsOneWidget);
    });

    testWidgets('Seleciona dia 28 e verifica que a mesa redonda foi renderizada', (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());

      // Check that 'Palestra de 09:30 até 10:00' is not on the screen before tapping '28'.
      expect(find.text('Palestra de 09:30 até 10:00'), findsNothing);
      await expectLater(
        find.byType(Calendar),
        matchesGoldenFile('../screenshots/CalendarPage-Day26.png'),
      );

      // Tap on the '28'.
      await tester.tap(find.text('28'));
      await tester.pumpAndSettle();

      await expectLater(
        find.byType(Calendar),
        matchesGoldenFile('../screenshots/CalendarPage-Day28.png'),
      );

      // Then check if 'Palestra de 09:30 até 10:00' appears.
      expect(find.text('Palestra de 09:30 até 10:00'), findsOneWidget);
    });
  });
}
