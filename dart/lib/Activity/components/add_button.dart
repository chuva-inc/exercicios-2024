
import 'package:chuva_dart/data/models/activities.dart';
import 'package:chuva_dart/data/repositories/activities_repository.dart';
import 'package:flutter/material.dart';
import 'package:from_css_color/from_css_color.dart';
import 'package:provider/provider.dart';

class AddButton extends StatefulWidget {
  const AddButton({super.key, required this.activitie});

  final Activities activitie;


  @override
  State<AddButton> createState() => _AddButtonState();
}

class _AddButtonState extends State<AddButton> {
  Activities get activitie => widget.activitie;
  late ActivitiesRepository activitiesRepository;

  bool isProcessing = false;
  late bool isFavorite;

  @override
  Widget build(BuildContext context) {
    activitiesRepository  = context.watch<ActivitiesRepository>();
    isFavorite = activitiesRepository.favorites.any((fav) => fav.id == activitie.id);
    return Padding(
      padding: const EdgeInsetsDirectional.symmetric(horizontal: 10),
      child: ElevatedButton(
        onPressed: () async {
          setState(() {
            isProcessing = true;
          });
          await Future.delayed(const Duration(seconds: 1));
          context.read<ActivitiesRepository>().toggleFavorite(activitie.id);
          bool newIsFavorite = activitiesRepository.favorites.any((fav) => fav.id == activitie.id);
          if (newIsFavorite != isFavorite) {
            final snackBar = SnackBar(
              content: Text(newIsFavorite
                  ? "Vamos te lembrar dessa Atividade."
                  : "Não vamos mais te lembrar dessa Atividade."),
              backgroundColor: Colors.black54,
            );
            ScaffoldMessenger.of(context).showSnackBar(snackBar);
          }
          setState(() {
            isFavorite = newIsFavorite;
            isProcessing = false;
          });
        },
        style: ButtonStyle(
          iconColor: MaterialStateProperty.all(isProcessing ? fromCssColor("#888888") : (isFavorite ? Colors.white : Colors.white)),
          backgroundColor: MaterialStateProperty.all(isProcessing ? fromCssColor("#dcdcdc") : (isFavorite ? fromCssColor("#306dc3") : fromCssColor("#306dc3"))),
        ),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            isProcessing
                ? const Icon(Icons.refresh)
                : (isFavorite ? const Icon(Icons.star_border) : const Icon(Icons.star)),
            const SizedBox(width: 5,),
            Text(
              isProcessing ? "Processando" : (isFavorite ? "Remover da sua agenda" : "Adicionar à sua agenda"),
              style: TextStyle(color: isProcessing ? fromCssColor("#888888") : (isFavorite ? Colors.white : Colors.white)),
            )
          ],
        ),
      ),
    );
  }
}


