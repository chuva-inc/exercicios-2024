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
      expect(find.text('Mesa redonda de 16:30 até 17:30'), findsNothing);
    });

    testWidgets('Seleciona dia 28 e verifica que a mesa redonda foi renderizada', (WidgetTester tester) async {
      await tester.pumpWidget(const ChuvaDart());

      // Check that 'Mesa redonda de 16:30 até 17:30' is not on the screen before tapping '28'.
      expect(find.text('Mesa redonda de 16:30 até 17:30'), findsNothing);
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

      // Then check if 'Mesa redonda de 16:30 até 17:30' appears.
      expect(find.text('Mesa redonda de 16:30 até 17:30'), findsOneWidget);
    });
  });
}
