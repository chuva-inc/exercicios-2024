import 'package:flutter/material.dart';

void main() {
  runApp(const ChuvaDart());
}

class ChuvaDart extends StatelessWidget {
  const ChuvaDart({super.key});

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      home: const Calendar(),
    );
  }
}

class Calendar extends StatefulWidget {
  const Calendar({super.key});

  @override
  State<Calendar> createState() => _CalendarState();
}

class _CalendarState extends State<Calendar> {
  DateTime _currentDate = DateTime(2023, 11, 8);
  bool _clicked = false;

  void _changeDate(DateTime newDate) {
    setState(() {
      _currentDate = newDate;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: const Text('Chuva ❤️ Flutter'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            const Text(
              'Programação',
            ),
            const Text(
              'Nov',
            ),
            const Text(
              '2023',
            ),
            OutlinedButton(
              onPressed: () {
                _changeDate(DateTime(2023, 11, 26));
              },
              child: Text(
                '26',
                style: Theme.of(context).textTheme.headlineMedium,
              ),
            ),
            OutlinedButton(
              onPressed: () {
                _changeDate(DateTime(2023, 11, 28));
              },
              child: Text(
                '28',
                style: Theme.of(context).textTheme.headlineMedium,
              ),
            ),
            if (_currentDate.day == 28)
              OutlinedButton(
                  onPressed: () {
                    setState(() {
                      _clicked = true;
                    });
                  },
                  child: const Text('Mesa redonda de 16:30 até 17:30')),
            if (_clicked) const Activity(),
          ],
        ),
      ),
    );
  }
}

class Activity extends StatefulWidget {
  const Activity({super.key});

  @override
  State<Activity> createState() => _ActivityState();
}

class _ActivityState extends State<Activity> {
  bool _favorited = false;

  @override
  Widget build(BuildContext context) {
    return Container(
      color: Theme.of(context).colorScheme.inversePrimary,
      child: Column(children: [
        Text(
          'Activity title',
          style: Theme.of(context).textTheme.bodySmall,
        ),
        const Text('Mesa redonda'),
        const Text('Segunda-feira 16:30h - 17:30h'),
        ElevatedButton.icon(
          onPressed: () {
            setState(() {
              _favorited = !_favorited;
            });
          },
          icon: _favorited
              ? const Icon(Icons.star)
              : const Icon(Icons.star_outline),
          label: Text(
              _favorited ? 'Remover da sua agenda' : 'Adicionar à sua agenda'),
        )
      ]),
    );
  }
}
